<?php
// Interface Segregation Principle vaolation
interface Workable {
    public function canCode();
    public function code();
    public function test();

}

class Programmer implements Workable {
    public function canCode() {
        return true;
    }

    public function code() {
        return 'coading';
    }

    public function test() {
        return 'testing in localhost';
    }
}

class Tester implements Workable {
    public function canCode() {
        return false;
    }

    public function code() {
        throw new Exception('Opps! I can not code');
    }

    public function test() {
        return 'testing in server';
    }
}

class ProjectManagement {
    public function __construct(Workable $memeber) {
        if ($memeber->canCode()) {
            $memeber->code;
        }
    }
}

// Refactored Code
interface Codeable {
    public function code();
}
interface Testable {
    public function test();
}

class Programmer implements Codeable, Testable {

    public function code() {
        return 'coading';
    }

    public function test() {
        return 'testing in localhost';
    }
}

class Tester implements Testable {

    public function test() {
        return 'testing in server';
    }
}

class ProjectManagement {
    public function __construct(Codeable $memeber) {
        $memeber->code;
    }
}
?>