<!DOCTYPE html>
<html>
<head>
    <title>Vaccination System Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .dashboard-header {
            text-align: center;
            color: white;
            padding: 50px 0;
            margin-bottom: 30px;
        }
        .dashboard-header h1 {
            font-size: 3rem;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .dashboard-header p {
            font-size: 1.2rem;
            opacity: 0.9;
        }
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
            transition: transform 0.3s, box-shadow 0.3s;
            background: white;
            margin-bottom: 20px;
        }
        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.3);
        }
        .card-header {
            background: linear-gradient(135deg, #ff9a9e 0%, #fecfef 100%);
            color: white;
            border-radius: 15px 15px 0 0 !important;
            border: none;
            text-align: center;
            font-weight: bold;
            font-size: 1.2rem;
        }
        .card-body {
            padding: 20px;
        }
        .table {
            margin-bottom: 0;
        }
        .table thead th {
            background: #f8f9fa;
            border: none;
            color: #495057;
        }
        .manage-link {
            display: inline-block;
            margin-top: 10px;
            color: #667eea;
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s;
        }
        .manage-link:hover {
            color: #764ba2;
            text-decoration: underline;
        }
        .stat-card {
            background: linear-gradient(135deg, #a8edea 0%, #fed6e3 100%);
            color: #495057;
            text-align: center;
            padding: 20px;
            border-radius: 15px;
            margin-bottom: 20px;
        }
        .stat-card h3 {
            font-size: 2rem;
            margin-bottom: 5px;
        }
        .stat-card p {
            font-size: 1rem;
            margin: 0;
        }
    </style>
</head>
<body>
    <div class="dashboard-header">
        <h1><i class="fas fa-chart-line"></i> Vaccination System Dashboard</h1>
        <p>Manage and monitor vaccination records efficiently</p>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="stat-card">
                    <i class="fas fa-boxes fa-2x"></i>
                    <h3>{{ $totalBatches }}</h3>
                    <p>Total Batches</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-card">
                    <i class="fas fa-users fa-2x"></i>
                    <h3>{{ $totalPatients }}</h3>
                    <p>Total Patients</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-card">
                    <i class="fas fa-user-md fa-2x"></i>
                    <h3>{{ $totalHealthWorkers }}</h3>
                    <p>Health Workers</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-card">
                    <i class="fas fa-vial fa-2x"></i>
                    <h3>{{ $totalVaccines }}</h3>
                    <p>Vaccines</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="stat-card">
                    <i class="fas fa-calendar-alt fa-2x"></i>
                    <h3>{{ $totalSchedules }}</h3>
                    <p>Total Schedules</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-card">
                    <i class="fas fa-clipboard-list fa-2x"></i>
                    <h3>{{ $totalVaccinationRecords }}</h3>
                    <p>Vaccination Records</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-card">
                    <i class="fas fa-syringe fa-2x"></i>
                    <h3>{{ $totalDoses }}</h3>
                    <p>Total Vaccine Doses</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-card">
                    <i class="fas fa-chart-line fa-2x"></i>
                    <h3>{{ $completedVaccinations }}</h3>
                    <p>Completed Vaccinations</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="stat-card">
                    <i class="fas fa-user-check fa-2x"></i>
                    <h3>{{ $vaccinatedPeople }}</h3>
                    <p>People Vaccinated</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="stat-card">
                    <i class="fas fa-percentage fa-2x"></i>
                    <h3>{{ $totalPatients > 0 ? round(($vaccinatedPeople / $totalPatients) * 100, 1) : 0 }}%</h3>
                    <p>Vaccination Coverage</p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <i class="fas fa-boxes"></i> Recent Batches
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Batch Number</th>
                                    <th>Quantity</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($batches as $batch)
                                <tr>
                                    <td>{{ $batch->batch_id }}</td>
                                    <td>{{ $batch->batch_number }}</td>
                                    <td>{{ $batch->quantity }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <a href="{{ route('batches.index') }}" class="manage-link">Manage Batches <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <i class="fas fa-users"></i> Recent Patients
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Contact</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($patients as $patient)
                                <tr>
                                    <td>{{ $patient->patient_id }}</td>
                                    <td>{{ $patient->name }}</td>
                                    <td>{{ $patient->contact }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <a href="{{ route('patients.index') }}" class="manage-link">Manage Patients <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <i class="fas fa-user-md"></i> Recent Health Workers
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Role</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($healthWorkers as $worker)
                                <tr>
                                    <td>{{ $worker->id }}</td>
                                    <td>{{ $worker->first_name }} {{ $worker->last_name }}</td>
                                    <td>{{ $worker->role }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <a href="{{ route('health_workers.index') }}" class="manage-link">Manage Health Workers <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <i class="fas fa-calendar-alt"></i> Recent Schedules
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Patient ID</th>
                                    <th>Vaccine ID</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($schedules as $schedule)
                                <tr>
                                    <td>{{ $schedule->schedule_id }}</td>
                                    <td>{{ $schedule->patient_id }}</td>
                                    <td>{{ $schedule->vaccine_id }}</td>
                                    <td>{{ $schedule->status }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <a href="{{ route('schedules.index') }}" class="manage-link">Manage Schedules <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <i class="fas fa-clipboard-list"></i> Recent Vaccination Records
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Patient ID</th>
                                    <th>Vaccine ID</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($vaccinationRecords as $record)
                                <tr>
                                    <td>{{ $record->record_id }}</td>
                                    <td>{{ $record->patient_id }}</td>
                                    <td>{{ $record->vaccine_id }}</td>
                                    <td>{{ $record->status }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <a href="{{ route('vaccination_records.index') }}" class="manage-link">Manage Records <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <i class="fas fa-vial"></i> Vaccines
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Manufacturer</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($vaccines as $vaccine)
                                <tr>
                                    <td>{{ $vaccine->vaccine_id }}</td>
                                    <td>{{ $vaccine->name }}</td>
                                    <td>{{ $vaccine->manufacturer }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <a href="{{ route('vaccines.index') }}" class="manage-link">Manage Vaccines <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <i class="fas fa-chart-bar"></i> Patients per Vaccine
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Vaccine Name</th>
                                    <th>Patients Vaccinated</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($patientsPerVaccine as $vaccine)
                                <tr>
                                    <td>{{ $vaccine->name }}</td>
                                    <td>{{ $vaccine->records_count }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <i class="fas fa-chart-pie"></i> Vaccination Status Overview
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Status</th>
                                    <th>Count</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $statusCounts = \App\Models\VaccinationRecord::selectRaw('status, COUNT(*) as count')->groupBy('status')->get();
                                @endphp
                                @foreach($statusCounts as $status)
                                <tr>
                                    <td>{{ $status->status ?: 'Not Set' }}</td>
                                    <td>{{ $status->count }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

