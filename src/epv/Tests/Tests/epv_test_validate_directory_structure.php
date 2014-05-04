<?php
/**
 *
 * @package EPV
 * @copyright (c) 2014 phpBB Group
 * @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 *
 */
namespace epv\Tests\Tests;

use epv\Output\Output;
use epv\Output\OutputInterface;
use epv\Tests\BaseTest;

class epv_test_validate_directory_structure  extends BaseTest{
    public function __construct($debug, OutputInterface $output, $basedir)
    {
        parent::__construct($debug, $output, $basedir);

        $this->directory = true;

    }

    public function validateDirectory(array $dirList)
    {
        $requiredFiles = array(
            'license.txt',
            'composer.json',
            'ext.php',
        );

        foreach ($requiredFiles as $file)
        {
            // TODO: Depending on the specs for extensions.
            $found = false;

            foreach ($dirList as $dir)
            {
                if (basename($dir) == $file)
                {
                    $found = true;
                    break;
                }
            }
            if (!$found)
            {
                $this->output->addMessage(Output::ERROR, sprintf("The required file %s is missing in the extension package.", $file));
            }
        }
    }

    public function testName()
    {
        return "Validate directory structure";
    }
}