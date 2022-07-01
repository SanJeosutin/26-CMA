<?php
/*
 * DotEnv class are used to load .env file
 */
class DotEnv
{
    protected $path;

    public function __construct(string $path)
    {
        try{
            /* check whether the file exists. When so, load it. */
            if(!file_exists($path)){
                throw new \InvalidArgumentException(sprintf('File not found at: %s', $path));
            }
            $this->path = $path;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function load() :void{
        try{
            /* check whether the file is readable. */
            if(!is_readable($this->path)){
                throw new \InvalidArgumentException(sprintf('File not readable at: %s', $this->path));
            }

            $lines = file($this->path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
            foreach($lines as $line){
                if(strpos(trim($line), '#') === 0){
                    continue;
                }
                list($var, $val)= explode('=', $line, 2);
                $var = trim($var);
                $val = trim($val);

                if(!array_key_exists($var, $_SERVER) && !array_key_exists($var, $_ENV)){
                    putenv(sprintf('%s=%s', $var, $val));
                    $_ENV[$var] = $val;
                    $_SERVER[$var] = $val;
                }
            }
        } catch(Exception $e){
            echo $e->getMessage();
        }
    }
}
?>