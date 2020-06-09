<?php
// Open Closed Principle violation
class FileDisplay {
    function display($file, $fileType) {
        if ('mp4' == $fileType) {
            //display video player
        } else if ('mp3' == $fileType) {
            //display audio player
        } else {
            //display text file
        }
    }
}

//Refactor code
interface FileInterface {
    function display();
}
class FileDisplay {
    function display(FileInterface $file) {
        $file->display();
    }
}

class ImageFile implements FileInterface {
    public function __construct($filename) {}
    function display() {
        //take necessary steps to display image
    }
}

class VideoFile implements FileInterface {
    public function __construct($filename) {}
    function display() {
        //take necessary steps to display image
    }
}

$image = new ImageFile('ABCD.jpeg');
$image->display();

?>