<?php


namespace AppBundle\Routing;

use Symfony\Component\Config\Loader\Loader;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\RouteCollection;

class AdvancedLoader extends Loader
{
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function load($resource, $type = null)
    {
        $collection = new RouteCollection();

        $ip = $this->request->getClientIp();

        if($ip == '127.0.0.1'){
            $resource = '@AppBundle/Resources/config/import_routing1.yml';
        }else{
            $resource = '@AppBundle/Resources/config/import_routing2.yml';
        }

        $type = 'yaml';

        $importedRoutes = $this->import($resource, $type);

        $collection->addCollection($importedRoutes);

        return $collection;
    }

    public function supports($resource, $type = null)
    {
        return 'advanced_extra' === $type;
    }
}