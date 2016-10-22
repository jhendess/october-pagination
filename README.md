# Pagination plugin for October CMS

Enable automatic pagination for your (static) pages in OctoberCMS.

## Usage

This plugin supports currently only automatic pagination for HTML
content.
Any content that is given to the `autoPaginate` component
will be divided into separate pages based on a defined separator. The
default separator is `<!--PAGEBREAK-->`.

If you want to enable automatic pagination on all static pages using a 
separated layout, you can replace your `{% page %}` tag by
`{{ autoPaginate.render(staticPage) | raw }}`.