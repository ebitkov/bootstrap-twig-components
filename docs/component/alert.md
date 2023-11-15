# Alerts

(see also https://getbootstrap.com/docs/5.3/components/alerts/)

Fore more details on how to use UX components please visit
the [Symfony documentation](https://symfony.com/bundles/ux-twig-component/current/index.html).

## Basic Usage

The `AlertComponent` takes two arguments:

- a `type` equal to the alert variants defined on the Bootstrap documentation
- a `message` to print

```twig
<twig:bs:alert type="primary" message="Hello World"/>
```
translates to
```html
<div class="alert alert-primary" role="alert">
    Hello World
</div>
```

You can also completely overwrite the contents of the alert.

```twig
<twig:bs:alert type="danger">
    <b>Warning:<b>
    <p>It's dangerous out here!</p>
</twig:bs:alert>
```
translates to:
```html
<div class="alert alert-danger" role="alert">
    <b>Warning:</b>
    <p>It's dangerous out here!</p>
</div>
```

The component will automatically set the `alert` class and an `alert-{type}` class for styling. It also appends
the `role="alert"` attribute.