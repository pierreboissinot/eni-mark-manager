<?php
declare(strict_types=1);

namespace Pb\MarkManagement\Infrastructure\Framework;

use PhpCsFixer\Finder;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

final class ValidatorPass implements CompilerPassInterface
{
    /**
     * {@inheritdoc}
     */
    public function process(ContainerBuilder $container)
    {
        $validationFiles = [];
        foreach (Finder::create()->files()->in($this->getRootDirectory())->name('*.yml') as $file) {
            $validationFiles[] = $file->getPathname();
        }

        sort($validationFiles);

        $container->getDefinition('validator.builder')->addMethodCall(
            'addYamlMappings',
            [$validationFiles]
        );
    }

    /**
     * @return string
     *
     * @throws \ReflectionException
     */
    private function getRootDirectory(): string
    {
        $bundleClass = new \ReflectionClass(AppBundle::class);
        $rootDirectory = sprintf(
            '%s/../../Application/Resources/validation',
            dirname($bundleClass->getFileName())
        );

        return $rootDirectory;
    }
}
