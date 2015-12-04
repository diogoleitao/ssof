<?php



class Twig_Tests_FileCachingTest extends PHPUnit_Framework_TestCase
{
    protected $V2ej53en2bau;
    protected $Vx44ywczaw14;
    protected $Vrcgqb4ui03x;

    public function setUp()
    {
        $this->tmpDir = sys_get_temp_dir().'/TwigTests';
        if (!file_exists($this->tmpDir)) {
            @mkdir($this->tmpDir, 0777, true);
        }

        if (!is_writable($this->tmpDir)) {
            $this->markTestSkipped(sprintf('Unable to run the tests as "%s" is not writable.', $this->tmpDir));
        }

        $this->env = new Twig_Environment(new Twig_Loader_Array(array('index' => 'index', 'index2' => 'index2')), array('cache' => $this->tmpDir));
    }

    public function tearDown()
    {
        if ($this->fileName) {
            unlink($this->fileName);
        }

        $this->removeDir($this->tmpDir);
    }

    public function testWritingCacheFiles()
    {
        $Vkkm4e2vaxrv = 'index';
        $this->env->loadTemplate($Vkkm4e2vaxrv);
        $Ve4lwztzgmgu = $this->env->getCacheFilename($Vkkm4e2vaxrv);

        $this->assertTrue(file_exists($Ve4lwztzgmgu), 'Cache file does not exist.');
        $this->fileName = $Ve4lwztzgmgu;
    }

    public function testClearingCacheFiles()
    {
        $Vkkm4e2vaxrv = 'index2';
        $this->env->loadTemplate($Vkkm4e2vaxrv);
        $Ve4lwztzgmgu = $this->env->getCacheFilename($Vkkm4e2vaxrv);

        $this->assertTrue(file_exists($Ve4lwztzgmgu), 'Cache file does not exist.');
        $this->env->clearCacheFiles();
        $this->assertFalse(file_exists($Ve4lwztzgmgu), 'Cache file was not cleared.');
    }

    private function removeDir($Vgf254heetji)
    {
        $Vncikyhjbcqc = opendir($Vgf254heetji);
        while (false !== $Vq4aq0rd5eme = readdir($Vncikyhjbcqc)) {
            if (in_array($Vq4aq0rd5eme, array('.', '..'))) {
                continue;
            }

            if (is_dir($Vgf254heetji.'/'.$Vq4aq0rd5eme)) {
                self::removeDir($Vgf254heetji.'/'.$Vq4aq0rd5eme);
            } else {
                unlink($Vgf254heetji.'/'.$Vq4aq0rd5eme);
            }
        }
        closedir($Vncikyhjbcqc);
        rmdir($Vgf254heetji);
    }
}
