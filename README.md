# Bootstrap UX Twig Components

The goal of this project is to implement all components of the [Bootstrap frontend framework](https://getbootstrap.com/) as [Symfony UX Twig Components](https://symfony.com/bundles/ux-twig-component/current/index.html), reducing the amount of code while including all the recommended attributes (e.g. `role` or `aria-`).

# Why is this project archived?

**TL;DR: It just doesn't make sense. It's not shorter to write, not easier and not prettier. Create your own components as you need them.** 

When I started this project I just learned about the new [Symfony UX Twig Components](https://symfony.com/bundles/ux-twig-component/current/index.html). At the same time I had to prototype a lot of web projects using [Bootstrap](https://getbootstrap.com/) and got annoyed by the amount of markup I had to write, especially for bigger components like carousels or modals.

And then I thought to myself: Why not make every Bootstrap component also a Twig component. It seemed obvious. Bootstrap is already structured into components. Since I need Bootstrap in nearly all my projects, I started this bundle.

My goal was to reduce the amount a markup to write, make the code easier to read and bundle all the features of Bootstrap into the new Twig components, without losing the flexibility Bootstrap provides.

But I quickly realized: it's actually not as easy and straight forward as I thought. 

Let's take for example simpler components, like an alert or badges. Alerts as destined to be components, but effectively, there is no real benefit in writing

```twig
<twig:bs:alert type="primary" message="Hello World!" />
```

to just use plain HTML:

```html
<div class="alert alert-primary" role="alert">Hello World!</div>
```

The same is true for badges and other small components. The less markup and features a component has, the easier it is to implement, but also the easier it is to just use plain HTML for them. There is really not that much value in creating components for them - it becomes just another way of writing them. 

But what about bigger components, like cards, carousels, accordions, modals, etc. It's true, Twig could definitely generate all the markup those components need to work properly, but at the same time, there are so many more possibilities of using them and it's harder to make a Twig component capable of supporting all of those variations accordingly. 

Let's take for example cards. You can have a simple card with just a body:

```html
<div class="card">
    <div class="card-body">
        ...
    </div>
</div>
```

or with an image:

```html
<div class="card"
    <img class="card-img-top" ...>
    <div class="card-body">
        ...
    </div>
</div>
```

This image can be on top, at the bottom or in the background. Also there are headers and footers. What HTML element should be used for them? Is the header a `div`, a `h2` or a `h3`? And what if I want to add additional classes to any of the inner elements, like e.g. the image, the body or the footer? 

Considering all those possibilities makes it really difficult to create a component capable of supporting all features, be simple and have less markup then the original HTML.

That said, I decided to stop the development on this project. It doesn't make any sense for me to create a bundle with all Bootstrap components supporting all there features.

But feel free to fork or clone the resources in this project, if you find something useful for you. 

I still feel like it's a good idea to create components for carousels, modals, etc. But not as a bundle, but per-project with the features and the markup your app needs. 
