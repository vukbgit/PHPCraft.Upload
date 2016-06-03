<?php

namespace PHPCraft\Upload;

use Sirius\Upload\Handle;

/**
 * Manages uploads using siriusphp/upload  (https://github.com/siriusphp/upload)
 *
 * @author vuk <info@vuk.bg.it>
 */
class UploadSiriusPHPUploadAdapter implements UploadInterface
{
    /**
     * Constructor.
     *
     **/
    public function __construct()
    {
    }

    /**
     * Sets container
     *
     * @param string path
     **/
    public function setContainer($path){
    }
}