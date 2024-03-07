<!-- author: amin -->

<?php

class Figure {
    protected $color;
    protected $border;

    public function __construct($color, $border) {
        $this->color = $color;
        $this->border = $border;
    }

    public function draw() {
        // This method will be implemented in the child classes
    }
}

class Square extends Figure {
    private $side;

    public function __construct($color, $border, $side) {
        parent::__construct($color, $border);
        $this->side = $side;
    }

    public function draw() {
        // SVG code for drawing a square
        $svg_code = "<rect width='{$this->side}' height='{$this->side}' x='10' y='10' fill='{$this->color}' stroke='{$this->border}' />";
        return $svg_code;
    }
}

class Circle extends Figure {
    private $radius;

    public function __construct($color, $border, $radius) {
        parent::__construct($color, $border);
        $this->radius = $radius;
    }

    public function draw() {
        // SVG code for drawing a circle
        $svg_code = "<circle cx='50' cy='50' r='{$this->radius}' fill='{$this->color}' stroke='{$this->border}' />";
        return $svg_code;
    }
}

class Rectangle extends Figure {
    private $width;
    private $height;

    public function __construct($color, $border, $width, $height) {
        parent::__construct($color, $border);
        $this->width = $width;
        $this->height = $height;
    }

    public function draw() {
        // SVG code for drawing a rectangle
        $svg_code = "<rect width='{$this->width}' height='{$this->height}' x='10' y='10' fill='{$this->color}' stroke='{$this->border}' />";
        return $svg_code;
    }
}

class Triangle extends Figure {
    private $side1;
    private $side2;
    private $side3;

    public function __construct($color, $border, $side1, $side2, $side3) {
        parent::__construct($color, $border);
        $this->side1 = $side1;
        $this->side2 = $side2;
        $this->side3 = $side3;
    }

    public function draw() {
        // SVG code for drawing a triangle
        $svg_code = "<polygon points='200,10 250,190 150,190' fill='{$this->color}' stroke='{$this->border}' />";
        return $svg_code;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Three in a row</title>
</head>
<body>

    <svg width="100" height="100">
        <?php
       
        $square = new Square("lightblue", "black", 100);
        echo $square->draw() ;
     
     ?>
    </svg>
    <svg width="100" height="100">
        <?php
       
       $square = new Square("purple", "black", 100);
       echo $square->draw() ;
        
        
        ?>
    </svg>
    <svg width="100" height="100">
        <?php
       
       $square = new Square("green", "black", 100);
       echo $square->draw() ;
        echo"<br>";
        
        ?>
    </svg>
        

    <svg width="100" height="100">
        <?php

      $circle = new Circle("yellow", "black", 50);
      echo $circle->draw();
        ?>

    </svg>

    <svg width="100" height="100">
        <?php

      $circle = new Circle("yellow", "black", 50);
      echo $circle->draw();
        ?>

    </svg>

    <svg width="100" height="100">
        <?php

      $circle = new Circle("yellow", "black", 50);
      echo $circle->draw();
      echo"<br>";
        ?>

    </svg>


    <svg width="150" height="100">
        <?php
            $rectangle = new Rectangle("green", "black", 200, 100);
            echo $rectangle->draw();
                
                ?>
    </svg>
        
    <svg width="150" height="100">
        <?php
            $rectangle = new Rectangle("green", "black", 200, 100);
            echo $rectangle->draw();
                
                ?>
    </svg>
        
    <svg width="150" height="100">
        <?php
            $rectangle = new Rectangle("green", "black", 200, 100);
            echo $rectangle->draw();
            echo"<br>";
                ?>
    </svg>
        
    <svg width="150" height="100">
        <?php
             
     $triangle = new Triangle("blue", "black", 200, 100, 100);
     echo $triangle->draw();
                
                ?>
    </svg> 

    <svg width="150" height="100">
        <?php
             
     $triangle = new Triangle("blue", "black", 200, 100, 100);
     echo $triangle->draw();
                
                ?>
    </svg> 
    

    <svg width="150" height="100">
        <?php
             
     $triangle = new Triangle("blue", "black", 200, 100, 100);
     echo $triangle->draw();
                
                ?>
    </svg> 
    
    
 
</body>
</html>
