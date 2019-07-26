---
title: Usage
---

## Usage
###Importing the base layout in twig

In order to use the base layout in your template add the following code at the beginning of your twig templates:

<code>
    &#123;% extends &#x22;@MaterialDashboard/base.html.twig&#x22; %&#125;
</code>

**We've defined the following Twig blocks:**

<code>
    &#123;% block meta_title %&#125;
</code>

<code>
    &#123;% block stylesheets %&#125;
</code>

<code>
    &#123;% block sidebar %&#125;
</code>

<code>
	&#123;% block search_bar %&#125;
</code>

<code>
    &#123;% block notifications %&#125;
</code>

<code>
    &#123;% block body %&#125;
</code>

<code>
    &#123;% block javascripts %&#125;
</code>

###Card stats dashboard widget

![cardstats.png]({{site.baseurl}}/cardstats.png)

You can use it by placing the following in your code templete:
<code>
    &#123;% include '@MaterialDashboard/widgets/card-stats.html.twig' with  &#123;
    'type': 'success', 
    'icon': 'timeline', 
    'category': 'Used Space', 
    'title': '49/50', 
    'small': 'GB', 
    'footer_icon': 'date_range', 
    'footer_content': 'Last 24 hours',
    'additionalFooterIconClass': 'text-warning'
&#125; %&#125;
</code>
The options are the following:
***type*** can be:
* warning
* success
* danger
* info


***icon*** can be:
Any icon from [material.io](http://material.io)


***category*** can be: free text

***title*** can be: free text

***small*** can be: free text

***footer\_icon*** can be:
* date\_range
* local\_offer
* update
* warning

***footer\_content*** can be: free text

***additionalFooterIconClass*** can be: any bootstrap text color class, eg. text-warning, text-success, text-info, text-primary etc.

The widget generates the following twig template:
```
<div class="card card-stats">
    <div class="card-header card-header-{{ type }} card-header-icon">
        <div class="card-icon">
        <i class="material-icons">{{ icon }}</i>
        </div>
        <p class="card-category">{{ category }}</p>
        <h3 class="card-title">{{ title }}
        <small>{{ small }}</small>
        </h3>
    </div>
    <div class="card-footer">
        <div class="stats">
        <i class="material-icons text-danger">{{ footer_icon }}</i>
        {{ footer_content|raw }}
        </div>
    </div>
</div>
```