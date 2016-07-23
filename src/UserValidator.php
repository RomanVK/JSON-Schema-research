<?php

class UserValidator
{
    /**
     * @param string $json
     * @return bool
     */
    public function isValidUser(string $json): bool
    {
        $refResolver = new JsonSchema\RefResolver(new JsonSchema\Uri\UriRetriever(), new JsonSchema\Uri\UriResolver());
        $data = json_decode($json);
        $schema = $refResolver->resolve('file://'. realpath(__DIR__ . '/../src/schema.json'));
        $validator = new JsonSchema\Validator();
        $validator->check($data, $schema);
        if($validator->isValid())
            return true;
        else
            return false;
    }
}
