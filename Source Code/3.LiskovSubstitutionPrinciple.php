<?php
Liskov Substitution Principle Violate
class Bird {
    public function fly() {
        return "I can Fly";
    }
    public function eat() {
        return "I can eat";
    }
    public function sleep() {
        return "I can sleep";
    }
}

class Parrot extends Bird {
    public function fly() {
        return "I can Fly";
    }
    public function eat() {
        return "I can eat";
    }
    public function sleep() {
        return "I can sleep";
    }
}

class Osttrich extends Bird {
    public function fly() {
        return "I can Fly";
        // But ostrich can't fly
    }
    public function eat() {
        return "I can eat";
    }
    public function sleep() {
        return "I can sleep";
    }
}

//Refactor Code

abstract class Bird {
    abstract function eat();
    abstract function sleep();
}

abstract class FlyingBird extends Bird {
    abstract function fly();
}

abstract class WalkingBird extends Bird {
    abstract function walk();
}

class BirdManager {
    function maintainBird(Bird $b) {
        $b->eat();
        $b->sleep();
    }

    function moveFlayingBird(FlyingBird $fb) {
        $fb->fly();
    }

    function moveWalingBird(WalkingBird $wb) {
        $wb->walk();
    }
}

class Eagle extends FlyingBird {
    public function fly() {}
    public function eat() {}
    public function sleep() {}
}

class Osttrich extends WalkingBird {
    public function walk() {}
    public function eat() {}
    public function sleep() {}
}
?>