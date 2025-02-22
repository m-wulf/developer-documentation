# HTTP cache

[[= product_name =]] provides advanced caching features needed for its own content views,
to make Varnish and Fastly act as the view cache for the system.
This and other features allow [[= product_name =]] to be scaled up to serve high traffic websites and applications.

HTTP cache is handled by the [ezplatform-http-cache](https://github.com/ezsystems/ezplatform-http-cache) bundle,
which extends [friendsofsymfony/http-cache-bundle](https://foshttpcachebundle.readthedocs.io/en/2.8.0/),
a Symfony community bundle that in turn extends [Symfony HTTP cache](http://symfony.com/doc/5.1/http_cache.html).

For content view responses coming from [[= product_name =]] itself, this means that:

- Cache is **[content-aware](content_aware_cache.md)**, always kept up-to-date by invalidating using cache tags.
- Cache is **[context-aware](context_aware_cache.md)**, to cache request for logged-in users by varying on user permissions.

All of this works across all the supported reverse proxies:

- [Symfony HttpCache Proxy](#symfony-reverse-proxy) - limited to a single server, and with limited performance/features
- [Varnish](https://varnish-cache.org/) - high performance reverse proxy
- [Fastly](https://www.fastly.com/) - Varnish-based CDN service

You can use all these features in custom controllers as well.
