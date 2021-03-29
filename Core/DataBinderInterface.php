<?php
/**
 * Created by A Salameh.
 */

namespace Core;

interface DataBinderInterface
{
    public function bind(array $form, $className);

}