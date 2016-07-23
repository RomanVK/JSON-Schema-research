<?php
/**
 * Created by PhpStorm.
 * User: r_kuz
 * Date: 22.07.2016
 * Time: 21:39
 */
class UserValidator
{

    /**
     * @var string $schema
     */
    private $schema = "";

    /**
     * @param string $json
     * @return bool
     */
    public function isValidUser(string $json): bool
    {
        $path_to_schema = __DIR__ . '/../src/ValidUser.json';
        if(file_exists($path_to_schema)) {
            $file = fopen($path_to_schema, "r");
            if ($file) {
                while(($buffer = fgets($file)) !== false) {
                    $this->schema = $this->schema.$buffer;
                    print_r($buffer);
                }
                if (!feof($file)) {
                    return false;//Error: unexpected fgets() fail
                }
                fclose($file);
            }
        } else {
          return false; //file is not exist
        }

        $validator = new \JsonSchema\Validator();

        if (!empty($validator)) {
            $validator->check($json, $this->schema);
        } else {
            throw new Exception();
        }
        
        if (empty($validator->isValid())) return true;
        
        return false;
    }
}