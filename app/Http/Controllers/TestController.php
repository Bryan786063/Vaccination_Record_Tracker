<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Batch;
use App\Models\HealthWorker;
use App\Models\Patient;
use App\Models\Schedule;
use App\Models\User;
use App\Models\UserLog;
use App\Models\VaccinationRecord;
use App\Models\Vaccine;

class TestController extends Controller
{
    public function index()
    {
        $batches = Batch::latest()->take(5)->get();
        $healthWorkers = HealthWorker::latest()->take(5)->get();
        $patients = Patient::latest()->take(5)->get();
        $schedules = Schedule::latest()->take(5)->get();
        $users = User::latest()->take(5)->get();
        $userLogs = UserLog::latest()->take(5)->get();
        $vaccinationRecords = VaccinationRecord::latest()->take(5)->get();
        $vaccines = Vaccine::latest()->take(5)->get();

        // Additional stats
        $totalBatches = Batch::count();
        $totalPatients = Patient::count();
        $totalHealthWorkers = HealthWorker::count();
        $totalVaccines = Vaccine::count();
        $totalSchedules = Schedule::count();
        $totalVaccinationRecords = VaccinationRecord::count();
        $totalDoses = Batch::sum('quantity');
        $completedVaccinations = VaccinationRecord::where('status', 'Completed')->count();
        $vaccinatedPeople = VaccinationRecord::distinct('patient_id')->count('patient_id');

        // Patients per vaccine
        $patientsPerVaccine = Vaccine::withCount(['records' => function ($query) {
            $query->distinct('patient_id');
        }])->get();

        return view('test', compact(
            'batches',
            'healthWorkers',
            'patients',
            'schedules',
            'users',
            'userLogs',
            'vaccinationRecords',
            'vaccines',
            'totalBatches',
            'totalPatients',
            'totalHealthWorkers',
            'totalVaccines',
            'totalSchedules',
            'totalVaccinationRecords',
            'totalDoses',
            'completedVaccinations',
            'vaccinatedPeople',
            'patientsPerVaccine'
        ));
    }
}

