<?php

// Namespace
namespace Hospital;

// Abstract class
abstract class Person {
    // Properties
    private string $name;
    private string $eyeColor;
    private string $hairColor;
    private float $height;
    private float $weight;
    private string $role;

    // Constructor
    public function __construct(string $name, string $eyeColor, string $hairColor, float $height, float $weight, string $role) {
        $this->name = $name;
        $this->eyeColor = $eyeColor;
        $this->hairColor = $hairColor;
        $this->height = $height;
        $this->weight = $weight;
        $this->role = $role;
    }

    // Getter methods
    public function getName(): string {
        return $this->name;
    }

    public function getEyeColor(): string {
        return $this->eyeColor;
    }

    public function getHairColor(): string {
        return $this->hairColor;
    }

    public function getHeight(): float {
        return $this->height;
    }

    public function getWeight(): float {
        return $this->weight;
    }

    public function getRole(): string {
        return $this->role;
    }
}

// Abstract class
abstract class Staff extends Person {
    // Properties
    private float $hourlyRate;

    // Constructor
    public function __construct(string $name, string $eyeColor, string $hairColor, float $height, float $weight, string $role, float $hourlyRate) {
        parent::__construct($name, $eyeColor, $hairColor, $height, $weight, $role);
        $this->hourlyRate = $hourlyRate;
    }

    // Getter method
    public function getHourlyRate(): float {
        return $this->hourlyRate;
    }

    // Abstract method
    abstract public function setSalary(float $hoursWorked): float;
}

// Child class
class Doctor extends Staff {
    // Method implementation
    public function setSalary(float $hoursWorked): float {
        return $hoursWorked * $this->getHourlyRate();
    }
}

// Child class
class Nurse extends Staff {
    // Method implementation
    public function setSalary(float $hoursWorked): float {
        return $hoursWorked * $this->getHourlyRate();
    }
}

// Child class
class Patient extends Person {
    // Constructor
    public function __construct(string $name, string $eyeColor, string $hairColor, float $height, float $weight) {
        parent::__construct($name, $eyeColor, $hairColor, $height, $weight, "Patient");
    }
}

// Usage
$doctor = new Doctor("Dr. Smith", "Blue", "Brown", 180.0, 75.0, "Doctor", 50.0);
echo "Doctor's Name: " . $doctor->getName() . "<br>";
echo "Doctor's Role: " . $doctor->getRole() . "<br>";
echo "Doctor's Hourly Rate: $" . $doctor->getHourlyRate() . " per hour<br><br>";

$nurse = new Nurse("Nurse Jane", "Green", "Blonde", 170.0, 65.0, "Nurse", 30.0);
echo "Nurse's Name: " . $nurse->getName() . "<br>";
echo "Nurse's Role: " . $nurse->getRole() . "<br>";
echo "Nurse's Hourly Rate: $" . $nurse->getHourlyRate() . " per hour<br><br>";

$patient = new Patient("John Doe", "Brown", "Black", 175.0, 70.0);
echo "Patient's Name: " . $patient->getName() . "<br>";
echo "Patient's Role: " . $patient->getRole() . "<br>";

