Alerts
======

(see also https://getbootstrap.com/docs/5.3/components/alerts/)

Fore more details on how to use UX components please visit
the [Symfony documentation](https://symfony.com/bundles/ux-twig-component/current/index.html).

Basic Usage
-----------

The `AlertComponent` takes two arguments:

- a `type` equal to alert variants defined on the Bootstrap documentation
- a `message` to print

`type` will be translated to a `alert-{type}` class.

```twig
<twig:bs:alert type="primary" message="Hello World"/>
```

You can also completely overwrite the contents of the alert component.

```twig
<twig:bs:alert type="danger">
    <b>Warning:<b>
    <p>It's dangerous out here!</p>
</twig:bs:alert>
```