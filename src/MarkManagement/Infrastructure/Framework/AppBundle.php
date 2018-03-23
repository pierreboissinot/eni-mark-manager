<?php

namespace Pb\MarkManagement\Infrastructure\Framework;

use Doctrine\Bundle\DoctrineBundle\DependencyInjection\Compiler\DoctrineOrmMappingsPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class AppBundle extends Bundle
{
    /**
     * {@inheritdoc}
     */
    public function build(ContainerBuilder $container)
    {
        $container->addCompilerPass(new ValidatorPass());
        $container->addCompilerPass(DoctrineOrmMappingsPass::createYamlMappingDriver(
            [__DIR__ . '/../Persistence/Doctrine/Resources/mapping' => 'Pb\MarkManagement\Domain'],
            ['doctrine.orm.entity_manager']
        ));
    }
}
