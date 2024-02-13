<!-- Author: Amin Aouragh -->
<?php
//  waardes van de kamer
class Room {
    public $length;
    public $width;
    public $height;

    public function __construct($length, $width, $height) {
        $this->length = $length;
        $this->width = $width;
        $this->height = $height;
    }

    public function getVolume() {
        return $this->length * $this->width * $this->height;
    }

    public function getDimensions() {
        return "Lengte: {$this->length}m, Breedte: {$this->width}m, Hoogte: {$this->height}m";
    }
}

// kamers toevoegen

class House {
    public $rooms = [];

    public function addRoom(Room $room) {
        $this->rooms[] = $room;
    }

    public function getTotalVolume() {
        $totalVolume = 0;
        foreach ($this->rooms as $room) {
            $totalVolume += $room->getVolume();
        }
        return $totalVolume;
    }

    public function getPrice($pricePerCubicMeter) {
        return $this->getTotalVolume() * $pricePerCubicMeter;
    }

    public function getRoomDetails() {
        $roomDetails = "Inhoud kamers:<br>";
        foreach ($this->rooms as $room) {
            $roomDetails .= $room->getDimensions() . "<br>";
        }
        return $roomDetails;
    }
}


$room1 = new Room(5.2, 5.1, 5.5);
$room2 = new Room(4.8, 4.6, 4.9);
$room3 = new Room(5.9, 2.5, 3.1);

$house = new House();
$house->addRoom($room1);
$house->addRoom($room2);
$house->addRoom($room3);

$pricePerCubicMeter = 3000;

echo $house->getRoomDetails() . "<br>";
echo "Totaal volume: " . $house->getTotalVolume() . "m³<br>";
echo "Prijs van het huis: $" . $house->getPrice($pricePerCubicMeter) . "<br>";

?>
