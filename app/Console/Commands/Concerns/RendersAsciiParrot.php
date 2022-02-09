<?php

namespace App\Console\Commands\Concerns;

use Illuminate\Console\Command;

/**
 * @mixin Command
 */
trait RendersAsciiParrot
{
    public function drawMurderousWingedDevil(): void
    {
        $this->newLine();
        $this->line(<<<EOT
        <fg=red>            .-.. .-
        <fg=red>           .-. .- -.-. --- -.       ----
        <fg=red>         ,'  ~ ~ ~  /  <fg=magenta>(@)   <fg=red>\   ,'      \
        <fg=red>       ,'          <fg=yellow>/<fg=red>`.    ~ ~ \ /         \
        <fg=red>     ,'           <fg=yellow>| ,'<fg=red>\  ~ ~ ~ X     \  \  \
        <fg=red>   ,'  ,'          <fg=yellow>V<fg=red>--<       (       \  \  \
        <fg=red> ,'  ,'               (vv      \/\  \  \  |  |
        <fg=red>(__,'  ,'   /         (vv   ""    \  \  | |  |
        <fg=red>  (__,'    /   /       vv   """    \ |  / / /
        <fg=red>      \__,'   /  |     vv          / / / / /
        <fg=red>          \__/   / |  | \         / /,',','
        <fg=red>             \__/\_^  |  \       /,'',','\
        <fg=red>                    `-^.__>.____/  ' ,'   \
        <fg=red>                            // //---'      |
        <fg=green>         ===============<fg=red>(((((((<fg=green>=================
        <fg=red>                                     | \ \  \
        <fg=red>                                     / |  |  \
        <fg=red>                                    / /  / \  \
        <fg=red>                                    `.     |   \
        <fg=red>                                      `--------'
        <fg=green>
        EOT);
        $this->newLine();
    }
}
