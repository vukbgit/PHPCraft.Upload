<?php

namespace PHPCraft\Upload;

/**
 * Manages upload
 *
 * @author vuk <info@vuk.bg.it>
 */
interface UploadInterface
{
    /**
     * Sets container
     *
     * @param string path
     **/
    public function setContainer($path);
}