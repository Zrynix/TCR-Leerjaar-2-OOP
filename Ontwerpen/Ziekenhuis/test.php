<?php
require_once 'Doctor.php';
require_once 'Patient.php';
require_once 'Nurse.php';
require_once 'Appointment.php';

$doctor = new Doctor("Dr. Smith", "Brown", "Black", 180, 75, 50);
$patient = new Patient("John Doe", "Blue", "Blond", 175, 70);
$nurse = new Nurse("Nurse Jane", "Green", "Red", 165, 60, 1000);

$startTime = new DateTime("2024-03-07 09:00:00");
$endTime = new DateTime("2024-03-07 11:00:00");

$appointment = new Appointment($doctor, $patient, $startTime, $endTime, $nurse);
$cost = $appointment->calculateCost();

echo "Doctor's salary: $" . $cost[0] . "\n";
echo "Nurse's bonus: $" . $cost[1] . "\n";
?>
