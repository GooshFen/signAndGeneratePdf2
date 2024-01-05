<?php


namespace App\Services;

use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

class CreateTempDirService
{
    private $filesystem;
    private $parameterBag;

    public function __construct(Filesystem $filesystem, ParameterBagInterface $parameterBag)
    {
        $this->filesystem = $filesystem;
        $this->parameterBag = $parameterBag;
    }
    
    public function createTemporaryDirectory()
    {
        // Get the project root directory
        $projectDir = $this->parameterBag->get('kernel.project_dir');

        // Generate a unique name for the temporary directory
        $tempDirName = tempnam(sys_get_temp_dir(), 'signatures');
        unlink($tempDirName); // Remove the temporary file

        // Create the temporary directory in your project
        $tempDir = $projectDir . '/tmp/' . basename($tempDirName);

        // Create the directory
        $this->filesystem->mkdir($tempDir);

        return $tempDir;
    }
}
