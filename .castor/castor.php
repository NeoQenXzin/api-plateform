<?php


use Castor\Attribute\AsTask;
use function Castor\import;
use function Castor\io;
use function Castor\run;
use Symfony\Component\Finder\Finder;

import(__DIR__);

#[AsTask(description: 'Init symfony project')]
function initProject(): void
{
    io()->title('Creating project...');
    run(['symfony', 'new', '--dir=tmp', '--webapp'], quiet: true);
    run(['rm', '-rf', 'tmp/.git']);

    $finder = (new Finder())
        ->in('tmp')
        ->exclude(['.git'])
        ->ignoreDotFiles(false)
        ->depth(0);

    foreach ($finder as $item) {
        run(['mv', $item->getRealPath(), './']);
    }

    run(['rm', '-rf', 'tmp']);

    file_put_contents('.gitignore', implode(PHP_EOL, [
        '.idea',
        '.vscode',
    ]), FILE_APPEND);
}
