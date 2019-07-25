## Usage
###Importing the base layout in twig
In order to use the base layout in your template add the following code at the beginning of your twig templates:

    \{% extends \"@MaterialDashboard/base.html.twig\" %\}
    

We've defined the following Twig blocks:

    \{% block meta_title %\}
    \{% block stylesheets %\}
    \{% block sidebar %\}
	\{% block search_bar %\}
    \{% block notifications %\}
    \{% block body %\}
    \{% block javascripts %\}
   
###Card stats dashboard widget
![cardstats.png]({{site.baseurl}}/cardstats.png)
