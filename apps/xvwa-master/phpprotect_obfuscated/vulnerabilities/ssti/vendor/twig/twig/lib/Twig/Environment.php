<?php




class Twig_Environment
{
    const VERSION = '1.19.0';

    protected $Vne0bkzg1krv;
    protected $Vpnd0azzvluw;
    protected $Vcdcesb5ie0e;
    protected $Vwwoeolbwxd4;
    protected $Vcxwghl1fqnk;
    protected $Vcqfx51khqs0;
    protected $Vqfx20r3yfax;
    protected $V3hf0s3ktsxh;
    protected $V54a3x1swwor;
    protected $Vyc0bnncvwc5;
    protected $Vqfx20r3yfaxs;
    protected $Vwhrpr43obxe;
    protected $Vh4matx43sow;
    protected $V512ofmho3mi;
    protected $Vakwpkr2roqa;
    protected $Vdvmvneyp5qb;
    protected $Vlc4fyzso2hg;
    protected $Vy0twx0n31v0;
    protected $V5hezz1ycos2;
    protected $Vqpj3fhvabu4;
    protected $Vampoynxcxwi;
    protected $Vntpr0nsvaxx;
    protected $Vogbqrek1vjy = '__TwigTemplate_';
    protected $V0ytmy0mswz2;
    protected $Vvgbnxqtkyye;
    protected $Vy4ldbimruq5;

    
    public function __construct(Twig_LoaderInterface $Vpnd0azzvluw = null, $Vbo43qqknf4i = array())
    {
        if (null !== $Vpnd0azzvluw) {
            $this->setLoader($Vpnd0azzvluw);
        }

        $Vbo43qqknf4i = array_merge(array(
            'debug' => false,
            'charset' => 'UTF-8',
            'base_template_class' => 'Twig_Template',
            'strict_variables' => false,
            'autoescape' => 'html',
            'cache' => false,
            'auto_reload' => null,
            'optimizations' => -1,
        ), $Vbo43qqknf4i);

        $this->debug = (bool) $Vbo43qqknf4i['debug'];
        $this->charset = strtoupper($Vbo43qqknf4i['charset']);
        $this->baseTemplateClass = $Vbo43qqknf4i['base_template_class'];
        $this->autoReload = null === $Vbo43qqknf4i['auto_reload'] ? $this->debug : (bool) $Vbo43qqknf4i['auto_reload'];
        $this->strictVariables = (bool) $Vbo43qqknf4i['strict_variables'];
        $this->runtimeInitialized = false;
        $this->setCache($Vbo43qqknf4i['cache']);
        $this->functionCallbacks = array();
        $this->filterCallbacks = array();

        $this->addExtension(new Twig_Extension_Core());
        $this->addExtension(new Twig_Extension_Escaper($Vbo43qqknf4i['autoescape']));
        $this->addExtension(new Twig_Extension_Optimizer($Vbo43qqknf4i['optimizations']));
        $this->extensionInitialized = false;
        $this->staging = new Twig_Extension_Staging();
    }

    
    public function getBaseTemplateClass()
    {
        return $this->baseTemplateClass;
    }

    
    public function setBaseTemplateClass($Vnwpwvxwn3wh)
    {
        $this->baseTemplateClass = $Vnwpwvxwn3wh;
    }

    
    public function enableDebug()
    {
        $this->debug = true;
    }

    
    public function disableDebug()
    {
        $this->debug = false;
    }

    
    public function isDebug()
    {
        return $this->debug;
    }

    
    public function enableAutoReload()
    {
        $this->autoReload = true;
    }

    
    public function disableAutoReload()
    {
        $this->autoReload = false;
    }

    
    public function isAutoReload()
    {
        return $this->autoReload;
    }

    
    public function enableStrictVariables()
    {
        $this->strictVariables = true;
    }

    
    public function disableStrictVariables()
    {
        $this->strictVariables = false;
    }

    
    public function isStrictVariables()
    {
        return $this->strictVariables;
    }

    
    public function getCache()
    {
        return $this->cache;
    }

    
    public function setCache($Vcxwghl1fqnk)
    {
        $this->cache = $Vcxwghl1fqnk ? $Vcxwghl1fqnk : false;
    }

    
    public function getCacheFilename($Vkkm4e2vaxrv)
    {
        if (false === $this->cache) {
            return false;
        }

        $Vnwpwvxwn3wh = substr($this->getTemplateClass($Vkkm4e2vaxrv), strlen($this->templateClassPrefix));

        return $this->getCache().'/'.$Vnwpwvxwn3wh[0].'/'.$Vnwpwvxwn3wh[1].'/'.$Vnwpwvxwn3wh.'.php';
    }

    
    public function getTemplateClass($Vkkm4e2vaxrv, $V5ep0o103ibg = null)
    {
        return $this->templateClassPrefix.hash('sha256', $this->getLoader()->getCacheKey($Vkkm4e2vaxrv)).(null === $V5ep0o103ibg ? '' : '_'.$V5ep0o103ibg);
    }

    
    public function getTemplateClassPrefix()
    {
        return $this->templateClassPrefix;
    }

    
    public function render($Vkkm4e2vaxrv, array $Vhmvn2c55ghv = array())
    {
        return $this->loadTemplate($Vkkm4e2vaxrv)->render($Vhmvn2c55ghv);
    }

    
    public function display($Vkkm4e2vaxrv, array $Vhmvn2c55ghv = array())
    {
        $this->loadTemplate($Vkkm4e2vaxrv)->display($Vhmvn2c55ghv);
    }

    
    public function loadTemplate($Vkkm4e2vaxrv, $V5ep0o103ibg = null)
    {
        $Vxxplevwehs2 = $this->getTemplateClass($Vkkm4e2vaxrv, $V5ep0o103ibg);

        if (isset($this->loadedTemplates[$Vxxplevwehs2])) {
            return $this->loadedTemplates[$Vxxplevwehs2];
        }

        if (!class_exists($Vxxplevwehs2, false)) {
            if (false === $Vcxwghl1fqnk = $this->getCacheFilename($Vkkm4e2vaxrv)) {
                eval('?>'.$this->compileSource($this->getLoader()->getSource($Vkkm4e2vaxrv), $Vkkm4e2vaxrv));
            } else {
                if (!is_file($Vcxwghl1fqnk) || ($this->isAutoReload() && !$this->isTemplateFresh($Vkkm4e2vaxrv, filemtime($Vcxwghl1fqnk)))) {
                    $this->writeCacheFile($Vcxwghl1fqnk, $this->compileSource($this->getLoader()->getSource($Vkkm4e2vaxrv), $Vkkm4e2vaxrv));
                }

                require_once $Vcxwghl1fqnk;
            }
        }

        if (!$this->runtimeInitialized) {
            $this->initRuntime();
        }

        return $this->loadedTemplates[$Vxxplevwehs2] = new $Vxxplevwehs2($this);
    }

    
    public function createTemplate($V4lif0h4bhru)
    {
        $Vkkm4e2vaxrv = sprintf('__string_template__%s', hash('sha256', uniqid(mt_rand(), true), false));

        $Vpnd0azzvluw = new Twig_Loader_Chain(array(
            new Twig_Loader_Array(array($Vkkm4e2vaxrv => $V4lif0h4bhru)),
            $Vdo02rb24r2q = $this->getLoader(),
        ));

        $this->setLoader($Vpnd0azzvluw);
        try {
            $V4lif0h4bhru = $this->loadTemplate($Vkkm4e2vaxrv);
        } catch (Exception $Vawjopoun3xn) {
            $this->setLoader($Vdo02rb24r2q);

            throw $Vawjopoun3xn;
        }
        $this->setLoader($Vdo02rb24r2q);

        return $V4lif0h4bhru;
    }

    
    public function isTemplateFresh($Vkkm4e2vaxrv, $Vxb1yyvkglmy)
    {
        foreach ($this->extensions as $Vawjopoun3xnxtension) {
            $Vto203c3rzkl = new ReflectionObject($Vawjopoun3xnxtension);
            if (filemtime($Vto203c3rzkl->getFileName()) > $Vxb1yyvkglmy) {
                return false;
            }
        }

        return $this->getLoader()->isFresh($Vkkm4e2vaxrv, $Vxb1yyvkglmy);
    }

    
    public function resolveTemplate($Vkkm4e2vaxrvs)
    {
        if (!is_array($Vkkm4e2vaxrvs)) {
            $Vkkm4e2vaxrvs = array($Vkkm4e2vaxrvs);
        }

        foreach ($Vkkm4e2vaxrvs as $Vkkm4e2vaxrv) {
            if ($Vkkm4e2vaxrv instanceof Twig_Template) {
                return $Vkkm4e2vaxrv;
            }

            try {
                return $this->loadTemplate($Vkkm4e2vaxrv);
            } catch (Twig_Error_Loader $Vawjopoun3xn) {
            }
        }

        if (1 === count($Vkkm4e2vaxrvs)) {
            throw $Vawjopoun3xn;
        }

        throw new Twig_Error_Loader(sprintf('Unable to find one of the following templates: "%s".', implode('", "', $Vkkm4e2vaxrvs)));
    }

    
    public function clearTemplateCache()
    {
        $this->loadedTemplates = array();
    }

    
    public function clearCacheFiles()
    {
        if (false === $this->cache) {
            return;
        }

        foreach (new RecursiveIteratorIterator(new RecursiveDirectoryIterator($this->cache), RecursiveIteratorIterator::LEAVES_ONLY) as $Vq4aq0rd5eme) {
            if ($Vq4aq0rd5eme->isFile()) {
                @unlink($Vq4aq0rd5eme->getPathname());
            }
        }
    }

    
    public function getLexer()
    {
        if (null === $this->lexer) {
            $this->lexer = new Twig_Lexer($this);
        }

        return $this->lexer;
    }

    
    public function setLexer(Twig_LexerInterface $Vcqfx51khqs0)
    {
        $this->lexer = $Vcqfx51khqs0;
    }

    
    public function tokenize($Vxhxpu2senoc, $Vkkm4e2vaxrv = null)
    {
        return $this->getLexer()->tokenize($Vxhxpu2senoc, $Vkkm4e2vaxrv);
    }

    
    public function getParser()
    {
        if (null === $this->parser) {
            $this->parser = new Twig_Parser($this);
        }

        return $this->parser;
    }

    
    public function setParser(Twig_ParserInterface $Vqfx20r3yfax)
    {
        $this->parser = $Vqfx20r3yfax;
    }

    
    public function parse(Twig_TokenStream $Vxzcqmu3jtlz)
    {
        return $this->getParser()->parse($Vxzcqmu3jtlz);
    }

    
    public function getCompiler()
    {
        if (null === $this->compiler) {
            $this->compiler = new Twig_Compiler($this);
        }

        return $this->compiler;
    }

    
    public function setCompiler(Twig_CompilerInterface $V3hf0s3ktsxh)
    {
        $this->compiler = $V3hf0s3ktsxh;
    }

    
    public function compile(Twig_NodeInterface $Vz3fbiqci0vl)
    {
        return $this->getCompiler()->compile($Vz3fbiqci0vl)->getSource();
    }

    
    public function compileSource($Vxhxpu2senoc, $Vkkm4e2vaxrv = null)
    {
        try {
            return $this->compile($this->parse($this->tokenize($Vxhxpu2senoc, $Vkkm4e2vaxrv)));
        } catch (Twig_Error $Vawjopoun3xn) {
            $Vawjopoun3xn->setTemplateFile($Vkkm4e2vaxrv);
            throw $Vawjopoun3xn;
        } catch (Exception $Vawjopoun3xn) {
            throw new Twig_Error_Syntax(sprintf('An exception has been thrown during the compilation of a template ("%s").', $Vawjopoun3xn->getMessage()), -1, $Vkkm4e2vaxrv, $Vawjopoun3xn);
        }
    }

    
    public function setLoader(Twig_LoaderInterface $Vpnd0azzvluw)
    {
        $this->loader = $Vpnd0azzvluw;
    }

    
    public function getLoader()
    {
        if (null === $this->loader) {
            throw new LogicException('You must set a loader first.');
        }

        return $this->loader;
    }

    
    public function setCharset($Vne0bkzg1krv)
    {
        $this->charset = strtoupper($Vne0bkzg1krv);
    }

    
    public function getCharset()
    {
        return $this->charset;
    }

    
    public function initRuntime()
    {
        $this->runtimeInitialized = true;

        foreach ($this->getExtensions() as $Vawjopoun3xnxtension) {
            $Vawjopoun3xnxtension->initRuntime($this);
        }
    }

    
    public function hasExtension($Vkkm4e2vaxrv)
    {
        return isset($this->extensions[$Vkkm4e2vaxrv]);
    }

    
    public function getExtension($Vkkm4e2vaxrv)
    {
        if (!isset($this->extensions[$Vkkm4e2vaxrv])) {
            throw new Twig_Error_Runtime(sprintf('The "%s" extension is not enabled.', $Vkkm4e2vaxrv));
        }

        return $this->extensions[$Vkkm4e2vaxrv];
    }

    
    public function addExtension(Twig_ExtensionInterface $Vawjopoun3xnxtension)
    {
        if ($this->extensionInitialized) {
            throw new LogicException(sprintf('Unable to register extension "%s" as extensions have already been initialized.', $Vawjopoun3xnxtension->getName()));
        }

        $this->extensions[$Vawjopoun3xnxtension->getName()] = $Vawjopoun3xnxtension;
    }

    
    public function removeExtension($Vkkm4e2vaxrv)
    {
        if ($this->extensionInitialized) {
            throw new LogicException(sprintf('Unable to remove extension "%s" as extensions have already been initialized.', $Vkkm4e2vaxrv));
        }

        unset($this->extensions[$Vkkm4e2vaxrv]);
    }

    
    public function setExtensions(array $Vyc0bnncvwc5)
    {
        foreach ($Vyc0bnncvwc5 as $Vawjopoun3xnxtension) {
            $this->addExtension($Vawjopoun3xnxtension);
        }
    }

    
    public function getExtensions()
    {
        return $this->extensions;
    }

    
    public function addTokenParser(Twig_TokenParserInterface $Vqfx20r3yfax)
    {
        if ($this->extensionInitialized) {
            throw new LogicException('Unable to add a token parser as extensions have already been initialized.');
        }

        $this->staging->addTokenParser($Vqfx20r3yfax);
    }

    
    public function getTokenParsers()
    {
        if (!$this->extensionInitialized) {
            $this->initExtensions();
        }

        return $this->parsers;
    }

    
    public function getTags()
    {
        $V5hu3rl2wtua = array();
        foreach ($this->getTokenParsers()->getParsers() as $Vqfx20r3yfax) {
            if ($Vqfx20r3yfax instanceof Twig_TokenParserInterface) {
                $V5hu3rl2wtua[$Vqfx20r3yfax->getTag()] = $Vqfx20r3yfax;
            }
        }

        return $V5hu3rl2wtua;
    }

    
    public function addNodeVisitor(Twig_NodeVisitorInterface $Vy4jojjdmqtp)
    {
        if ($this->extensionInitialized) {
            throw new LogicException('Unable to add a node visitor as extensions have already been initialized.');
        }

        $this->staging->addNodeVisitor($Vy4jojjdmqtp);
    }

    
    public function getNodeVisitors()
    {
        if (!$this->extensionInitialized) {
            $this->initExtensions();
        }

        return $this->visitors;
    }

    
    public function addFilter($Vkkm4e2vaxrv, $Vntaxllqc33j = null)
    {
        if (!$Vkkm4e2vaxrv instanceof Twig_SimpleFilter && !($Vntaxllqc33j instanceof Twig_SimpleFilter || $Vntaxllqc33j instanceof Twig_FilterInterface)) {
            throw new LogicException('A filter must be an instance of Twig_FilterInterface or Twig_SimpleFilter');
        }

        if ($Vkkm4e2vaxrv instanceof Twig_SimpleFilter) {
            $Vntaxllqc33j = $Vkkm4e2vaxrv;
            $Vkkm4e2vaxrv = $Vntaxllqc33j->getName();
        }

        if ($this->extensionInitialized) {
            throw new LogicException(sprintf('Unable to add filter "%s" as extensions have already been initialized.', $Vkkm4e2vaxrv));
        }

        $this->staging->addFilter($Vkkm4e2vaxrv, $Vntaxllqc33j);
    }

    
    public function getFilter($Vkkm4e2vaxrv)
    {
        if (!$this->extensionInitialized) {
            $this->initExtensions();
        }

        if (isset($this->filters[$Vkkm4e2vaxrv])) {
            return $this->filters[$Vkkm4e2vaxrv];
        }

        foreach ($this->filters as $Vv32o5bifu0b => $Vntaxllqc33j) {
            $Vv32o5bifu0b = str_replace('\\*', '(.*?)', preg_quote($Vv32o5bifu0b, '#'), $Vc2wt4svqann);

            if ($Vc2wt4svqann) {
                if (preg_match('#^'.$Vv32o5bifu0b.'$#', $Vkkm4e2vaxrv, $Vqzeq4pbgqkr)) {
                    array_shift($Vqzeq4pbgqkr);
                    $Vntaxllqc33j->setArguments($Vqzeq4pbgqkr);

                    return $Vntaxllqc33j;
                }
            }
        }

        foreach ($this->filterCallbacks as $Vacpdwprwg3k) {
            if (false !== $Vntaxllqc33j = call_user_func($Vacpdwprwg3k, $Vkkm4e2vaxrv)) {
                return $Vntaxllqc33j;
            }
        }

        return false;
    }

    public function registerUndefinedFilterCallback($Vicg521opc2w)
    {
        $this->filterCallbacks[] = $Vicg521opc2w;
    }

    
    public function getFilters()
    {
        if (!$this->extensionInitialized) {
            $this->initExtensions();
        }

        return $this->filters;
    }

    
    public function addTest($Vkkm4e2vaxrv, $Vaks55ym420e = null)
    {
        if (!$Vkkm4e2vaxrv instanceof Twig_SimpleTest && !($Vaks55ym420e instanceof Twig_SimpleTest || $Vaks55ym420e instanceof Twig_TestInterface)) {
            throw new LogicException('A test must be an instance of Twig_TestInterface or Twig_SimpleTest');
        }

        if ($Vkkm4e2vaxrv instanceof Twig_SimpleTest) {
            $Vaks55ym420e = $Vkkm4e2vaxrv;
            $Vkkm4e2vaxrv = $Vaks55ym420e->getName();
        }

        if ($this->extensionInitialized) {
            throw new LogicException(sprintf('Unable to add test "%s" as extensions have already been initialized.', $Vkkm4e2vaxrv));
        }

        $this->staging->addTest($Vkkm4e2vaxrv, $Vaks55ym420e);
    }

    
    public function getTests()
    {
        if (!$this->extensionInitialized) {
            $this->initExtensions();
        }

        return $this->tests;
    }

    
    public function getTest($Vkkm4e2vaxrv)
    {
        if (!$this->extensionInitialized) {
            $this->initExtensions();
        }

        if (isset($this->tests[$Vkkm4e2vaxrv])) {
            return $this->tests[$Vkkm4e2vaxrv];
        }

        return false;
    }

    
    public function addFunction($Vkkm4e2vaxrv, $Vpdqyyybdwv1 = null)
    {
        if (!$Vkkm4e2vaxrv instanceof Twig_SimpleFunction && !($Vpdqyyybdwv1 instanceof Twig_SimpleFunction || $Vpdqyyybdwv1 instanceof Twig_FunctionInterface)) {
            throw new LogicException('A function must be an instance of Twig_FunctionInterface or Twig_SimpleFunction');
        }

        if ($Vkkm4e2vaxrv instanceof Twig_SimpleFunction) {
            $Vpdqyyybdwv1 = $Vkkm4e2vaxrv;
            $Vkkm4e2vaxrv = $Vpdqyyybdwv1->getName();
        }

        if ($this->extensionInitialized) {
            throw new LogicException(sprintf('Unable to add function "%s" as extensions have already been initialized.', $Vkkm4e2vaxrv));
        }

        $this->staging->addFunction($Vkkm4e2vaxrv, $Vpdqyyybdwv1);
    }

    
    public function getFunction($Vkkm4e2vaxrv)
    {
        if (!$this->extensionInitialized) {
            $this->initExtensions();
        }

        if (isset($this->functions[$Vkkm4e2vaxrv])) {
            return $this->functions[$Vkkm4e2vaxrv];
        }

        foreach ($this->functions as $Vv32o5bifu0b => $Vpdqyyybdwv1) {
            $Vv32o5bifu0b = str_replace('\\*', '(.*?)', preg_quote($Vv32o5bifu0b, '#'), $Vc2wt4svqann);

            if ($Vc2wt4svqann) {
                if (preg_match('#^'.$Vv32o5bifu0b.'$#', $Vkkm4e2vaxrv, $Vqzeq4pbgqkr)) {
                    array_shift($Vqzeq4pbgqkr);
                    $Vpdqyyybdwv1->setArguments($Vqzeq4pbgqkr);

                    return $Vpdqyyybdwv1;
                }
            }
        }

        foreach ($this->functionCallbacks as $Vacpdwprwg3k) {
            if (false !== $Vpdqyyybdwv1 = call_user_func($Vacpdwprwg3k, $Vkkm4e2vaxrv)) {
                return $Vpdqyyybdwv1;
            }
        }

        return false;
    }

    public function registerUndefinedFunctionCallback($Vicg521opc2w)
    {
        $this->functionCallbacks[] = $Vicg521opc2w;
    }

    
    public function getFunctions()
    {
        if (!$this->extensionInitialized) {
            $this->initExtensions();
        }

        return $this->functions;
    }

    
    public function addGlobal($Vkkm4e2vaxrv, $V2dijfr3ez0f)
    {
        if ($this->extensionInitialized || $this->runtimeInitialized) {
            if (null === $this->globals) {
                $this->globals = $this->initGlobals();
            }

            
        }

        if ($this->extensionInitialized || $this->runtimeInitialized) {
            
            $this->globals[$Vkkm4e2vaxrv] = $V2dijfr3ez0f;
        } else {
            $this->staging->addGlobal($Vkkm4e2vaxrv, $V2dijfr3ez0f);
        }
    }

    
    public function getGlobals()
    {
        if (!$this->runtimeInitialized && !$this->extensionInitialized) {
            return $this->initGlobals();
        }

        if (null === $this->globals) {
            $this->globals = $this->initGlobals();
        }

        return $this->globals;
    }

    
    public function mergeGlobals(array $Vhmvn2c55ghv)
    {
        
        
        foreach ($this->getGlobals() as $Vks5xpccznyi => $V2dijfr3ez0f) {
            if (!array_key_exists($Vks5xpccznyi, $Vhmvn2c55ghv)) {
                $Vhmvn2c55ghv[$Vks5xpccznyi] = $V2dijfr3ez0f;
            }
        }

        return $Vhmvn2c55ghv;
    }

    
    public function getUnaryOperators()
    {
        if (!$this->extensionInitialized) {
            $this->initExtensions();
        }

        return $this->unaryOperators;
    }

    
    public function getBinaryOperators()
    {
        if (!$this->extensionInitialized) {
            $this->initExtensions();
        }

        return $this->binaryOperators;
    }

    public function computeAlternatives($Vkkm4e2vaxrv, $Vyvo323monuc)
    {
        $Veawdoi2oak4 = array();
        foreach ($Vyvo323monuc as $Vcsi2wocrpxd) {
            $V5mejyg1xnea = levenshtein($Vkkm4e2vaxrv, $Vcsi2wocrpxd);
            if ($V5mejyg1xnea <= strlen($Vkkm4e2vaxrv) / 3 || false !== strpos($Vcsi2wocrpxd, $Vkkm4e2vaxrv)) {
                $Veawdoi2oak4[$Vcsi2wocrpxd] = $V5mejyg1xnea;
            }
        }
        asort($Veawdoi2oak4);

        return array_keys($Veawdoi2oak4);
    }

    protected function initGlobals()
    {
        $Vdvmvneyp5qb = array();
        foreach ($this->extensions as $Vawjopoun3xnxtension) {
            $Vawjopoun3xnxtGlob = $Vawjopoun3xnxtension->getGlobals();
            if (!is_array($Vawjopoun3xnxtGlob)) {
                throw new UnexpectedValueException(sprintf('"%s::getGlobals()" must return an array of globals.', get_class($Vawjopoun3xnxtension)));
            }

            $Vdvmvneyp5qb[] = $Vawjopoun3xnxtGlob;
        }

        $Vdvmvneyp5qb[] = $this->staging->getGlobals();

        return call_user_func_array('array_merge', $Vdvmvneyp5qb);
    }

    protected function initExtensions()
    {
        if ($this->extensionInitialized) {
            return;
        }

        $this->extensionInitialized = true;
        $this->parsers = new Twig_TokenParserBroker();
        $this->filters = array();
        $this->functions = array();
        $this->tests = array();
        $this->visitors = array();
        $this->unaryOperators = array();
        $this->binaryOperators = array();

        foreach ($this->extensions as $Vawjopoun3xnxtension) {
            $this->initExtension($Vawjopoun3xnxtension);
        }
        $this->initExtension($this->staging);
    }

    protected function initExtension(Twig_ExtensionInterface $Vawjopoun3xnxtension)
    {
        
        foreach ($Vawjopoun3xnxtension->getFilters() as $Vkkm4e2vaxrv => $Vntaxllqc33j) {
            if ($Vkkm4e2vaxrv instanceof Twig_SimpleFilter) {
                $Vntaxllqc33j = $Vkkm4e2vaxrv;
                $Vkkm4e2vaxrv = $Vntaxllqc33j->getName();
            } elseif ($Vntaxllqc33j instanceof Twig_SimpleFilter) {
                $Vkkm4e2vaxrv = $Vntaxllqc33j->getName();
            }

            $this->filters[$Vkkm4e2vaxrv] = $Vntaxllqc33j;
        }

        
        foreach ($Vawjopoun3xnxtension->getFunctions() as $Vkkm4e2vaxrv => $Vpdqyyybdwv1) {
            if ($Vkkm4e2vaxrv instanceof Twig_SimpleFunction) {
                $Vpdqyyybdwv1 = $Vkkm4e2vaxrv;
                $Vkkm4e2vaxrv = $Vpdqyyybdwv1->getName();
            } elseif ($Vpdqyyybdwv1 instanceof Twig_SimpleFunction) {
                $Vkkm4e2vaxrv = $Vpdqyyybdwv1->getName();
            }

            $this->functions[$Vkkm4e2vaxrv] = $Vpdqyyybdwv1;
        }

        
        foreach ($Vawjopoun3xnxtension->getTests() as $Vkkm4e2vaxrv => $Vaks55ym420e) {
            if ($Vkkm4e2vaxrv instanceof Twig_SimpleTest) {
                $Vaks55ym420e = $Vkkm4e2vaxrv;
                $Vkkm4e2vaxrv = $Vaks55ym420e->getName();
            } elseif ($Vaks55ym420e instanceof Twig_SimpleTest) {
                $Vkkm4e2vaxrv = $Vaks55ym420e->getName();
            }

            $this->tests[$Vkkm4e2vaxrv] = $Vaks55ym420e;
        }

        
        foreach ($Vawjopoun3xnxtension->getTokenParsers() as $Vqfx20r3yfax) {
            if ($Vqfx20r3yfax instanceof Twig_TokenParserInterface) {
                $this->parsers->addTokenParser($Vqfx20r3yfax);
            } elseif ($Vqfx20r3yfax instanceof Twig_TokenParserBrokerInterface) {
                $this->parsers->addTokenParserBroker($Vqfx20r3yfax);
            } else {
                throw new LogicException('getTokenParsers() must return an array of Twig_TokenParserInterface or Twig_TokenParserBrokerInterface instances');
            }
        }

        
        foreach ($Vawjopoun3xnxtension->getNodeVisitors() as $Vy4jojjdmqtp) {
            $this->visitors[] = $Vy4jojjdmqtp;
        }

        
        if ($Vqx3pej4qzjv = $Vawjopoun3xnxtension->getOperators()) {
            if (2 !== count($Vqx3pej4qzjv)) {
                throw new InvalidArgumentException(sprintf('"%s::getOperators()" does not return a valid operators array.', get_class($Vawjopoun3xnxtension)));
            }

            $this->unaryOperators = array_merge($this->unaryOperators, $Vqx3pej4qzjv[0]);
            $this->binaryOperators = array_merge($this->binaryOperators, $Vqx3pej4qzjv[1]);
        }
    }

    protected function writeCacheFile($Vq4aq0rd5eme, $Vw1hejthoeh0)
    {
        $Vsadndaabphy = dirname($Vq4aq0rd5eme);
        if (!is_dir($Vsadndaabphy)) {
            if (false === @mkdir($Vsadndaabphy, 0777, true)) {
                clearstatcache(false, $Vsadndaabphy);
                if (!is_dir($Vsadndaabphy)) {
                    throw new RuntimeException(sprintf('Unable to create the cache directory (%s).', $Vsadndaabphy));
                }
            }
        } elseif (!is_writable($Vsadndaabphy)) {
            throw new RuntimeException(sprintf('Unable to write in the cache directory (%s).', $Vsadndaabphy));
        }

        $Vp0rxxadhkik = tempnam($Vsadndaabphy, basename($Vq4aq0rd5eme));
        if (false !== @file_put_contents($Vp0rxxadhkik, $Vw1hejthoeh0)) {
            
            if (@rename($Vp0rxxadhkik, $Vq4aq0rd5eme) || (@copy($Vp0rxxadhkik, $Vq4aq0rd5eme) && unlink($Vp0rxxadhkik))) {
                @chmod($Vq4aq0rd5eme, 0666 & ~umask());

                return;
            }
        }

        throw new RuntimeException(sprintf('Failed to write cache file "%s".', $Vq4aq0rd5eme));
    }
}
