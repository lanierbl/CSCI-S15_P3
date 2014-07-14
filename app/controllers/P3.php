<?php

class P3 extends BaseController {

    public function generateLI()
    {
        $numParagraphs  = $_POST["numParagraphs"];

        $generator = new Badcow\LoremIpsum\Generator();
        $response = $generator->getParagraphs($numParagraphs);

        //  Send back JSON array
        return json_encode(array('type'=>'message', 'text'=>$response));

    }

    public function generateRU()
    {
        $numUsers  = $_POST["numUsers"];

        // require the Faker autoloader
        require_once base_path().'/vendor/fzaninotto/faker/src/autoload.php';
        // alternatively, use another PSR-0 compliant autoloader (like the Symfony2 ClassLoader for instance)

        $people = array();

        for($i = 0; $i < $numUsers; $i++) {

            // use the factory to create a Faker\Generator instance
            $faker = Faker\Factory::create();
            $tmpPerson =  array(
                "name"  => $faker->name,
                "address" => $faker->address,
                "birthdate" => $faker->date,
                "profile" => $faker->text
            );
            $people[] = $tmpPerson;
        }
        return json_encode(array('type'=>'message', 'text'=>$people));

    }

    public function generatePassword()
    {
        //Check $_POST vars are set, exit if any missing
        if(!isset($_POST["numWords"]) || !isset($_POST["capFirstChar"]) || !isset($_POST["caseOpt"]))
        {
            $output = json_encode(array('type'=>'error', 'text' => 'Input fields are empty!'));
            die($output);
        }

        $numWords       = $_POST["numWords"];
        $SpecChar       = $_POST["SpecChar"] == 1 ? true : false;
        $capFirstChar   = $_POST["capFirstChar"] == 1 ? true : false;
        $caseOpt        = $_POST["caseOpt"];
        $incNum         = $_POST["incNum"] == 1 ? true : false;
        $maxLength      = $_POST["maxLength"];

        // Set the path to wordlist
        $wordlist = app_path().'/database/wordlist.txt';

        // Initial password variable initialized
        $passwd = "";
        // Open external file containing list of works
        $file = new SplFileObject($wordlist);
        // Set max word list of external file
        $maxFileWords = 58000;
        // String of random characters
        $randChars = '!@#$%^&*';
        // Loop count = requested password length
        for($i = 0; $i < $numWords; $i++) {
            // Determine random int to determine which word to retrieve
            $fileLine = rand(1,$maxFileWords);
            // Open external file and go to specified line
            $file->seek($fileLine-1);
            // Append special char if desired
            $passwd = $passwd.($SpecChar ? $randChars[rand(0, strlen($randChars)-1)] : '');
            // Append number if desired
            $passwd = $passwd.($incNum ? rand(0,9) : '');
            // Append word to existing passwd string
            if (($i == 0) and ($capFirstChar)) {
                $passwd = $passwd.trim(ucwords($file->current()));
            } else {
                $passwd = $passwd.trim(($caseOpt == 'firstUpper') ? ucwords($file->current()) : $file->current());
            }
            // If loop continuing, add a "-" between words
            if ($i < ($numWords - 1)) {
                $passwd = $passwd."-";
            }
        }
        // Convert string if all lower-case is desired (Except when the first character of first word is selected)
        if (($caseOpt == 'allLower') and !($capFirstChar)) {
            $passwd = strtolower($passwd);
        }
        // Convert string if all upper-case is desired
        if ($caseOpt == 'allUpper') {
            $passwd = strtoupper($passwd);
        }
        // Truncate string if it exceeds the maximum length desired
        if ($maxLength != 0)  {
            $passwd = substr($passwd,0,$maxLength);
        }
        //  Send back JSON array
        return json_encode(array('type'=>'message', 'text'=>$passwd));
    }
}
