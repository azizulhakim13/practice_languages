<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        class fruit {
            public $name;
            public $color;

            public function __construct($name, $color)
            {
                $this->name = $name;
                $this->color = $color;
            }

            public function intro(){
                echo "A {$this->name} is a fruit and the color of th fruit is {$this->color}";
            }
        }
    ?>
</body>
</html>