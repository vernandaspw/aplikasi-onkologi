<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Pasien extends Model
{
    use HasFactory;
    protected $connection = 'sqlsrv_Sphaira';
    protected $table = 'Patient';
    protected $guarded = ['MedicalNo'];
    protected $primaryKey = 'MedicalNo';

    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;

    public static function patientCancers($q = null)
    {
        $data = DB::table('EpisodeDiagnosis')
            ->select('Registration.MedicalNo', 'Patient.PatientName', DB::raw('MAX(Registration.RegistrationDateTime) as last_visit'))
            ->join('Diagnosis', 'EpisodeDiagnosis.DiagnosisCode', '=', 'Diagnosis.DiagnosisCode')
            ->join('ICDBlock', 'Diagnosis.ICDBlockID', '=', 'ICDBlock.ICDBlockID')
            ->join('Registration', 'EpisodeDiagnosis.RegistrationNo', '=', 'Registration.RegistrationNo')
            ->join('Patient', 'Registration.MedicalNo', '=', 'Patient.MedicalNo')
            ->whereIn('ICDBlock.ICDBlockID', [
                'C00-C14',
                'C15-C26',
                'C30-C39',
                'C40-C41',
                'C43-C44',
                'C45-C49',
                'C50-C50',
                'C51-C58',
                'C60-C63',
                'C64-C68',
                'C69-C72',
                'C73-C75',
                'C76-C80',
                'C81-C96',
                'C97-C97',
                'D00-D09',
                'D10-D36',
                'D37-D48',
            ])
            ->orWhere('Diagnosis.DiagnosisCode', 'Z03.1')
            ->groupBy('Registration.MedicalNo', 'Patient.PatientName')
            ->orderBy('last_visit', 'desc');

        if ($q) {
            if (isset($q['take'])) {
                $data->take($q['take']);
            }
        }

        return $data->get();
    }

    public static function PatientRegs($medicalNo)
    {
        $result = DB::table('EpisodeDiagnosis')
            ->select('Registration.RegistrationNo', 'Registration.MedicalNo', 'Patient.PatientName', DB::raw('RegistrationDateTime as last_visit'))
            ->join(DB::raw("
    (
    SELECT Diagnosis.*
    FROM Diagnosis
    INNER JOIN ICDBlock ON Diagnosis.ICDBlockID = ICDBlock.ICDBlockID
    WHERE ICDBlock.ICDBlockID IN (
        'C00-C14', 'C15-C26', 'C30-C39', 'C40-C41', 'C43-C44', 'C45-C49',
        'C50-C50', 'C51-C58', 'C60-C63', 'C64-C68', 'C69-C72', 'C73-C75',
        'C76-C80', 'C81-C96', 'C97-C97', 'D00-D09', 'D10-D36', 'D37-D48'
    ) OR Diagnosis.DiagnosisCode = 'Z03.1'
    ) as Kanker
"), 'EpisodeDiagnosis.DiagnosisCode', '=', 'Kanker.DiagnosisCode')
            ->join('Registration', 'EpisodeDiagnosis.RegistrationNo', '=', 'Registration.RegistrationNo')
            ->join('Patient', 'Registration.MedicalNo', '=', 'Patient.MedicalNo')
            ->where('Registration.MedicalNo', $medicalNo)
            ->groupBy('Registration.RegistrationNo', 'Registration.MedicalNo', 'Patient.PatientName', 'RegistrationDateTime')
            ->orderByDesc('RegistrationDateTime')
            ->get();

        return $result;
    }
}
