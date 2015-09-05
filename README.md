# Twig Building blocks

## Installation

```sh
php composer.phar install
cd example/
php -S locahost:8000 index.php
```

----------------------


## Themes

### Bootstrap 3

Macros using Twitter's Bootstrap 3.2 version.

  - **macro**: `@bootstrap`
  - **path**: `theme/bootstrap3`

Supported Bootstrap themes:

  - **FlatUI**
    - **macro**: `@flatui`
    - **path**: `theme/bootstrap3_flat-ui`

#### Tabs

- **Macro**: `flat_tabs(tabs, tab_content, selected)`
- **Attributes**:
  - **tabs** : Associative array `{"key" :"the name of the tab", "value": "the string to show"}`
  - **tab_content** : Associative array `{"key" :"the name of the tab", "value": "HTML for the tab"}`
  - **selected** : `string` with the name of the `active` tab. If none, first is selected.

```twig
{% from '@bootstrap/components/tabs/flat_tabs/flat_tabs.html.twig' import flat_tabs as tabs %}

<div class="container" style="max-width:700px">

    <h3>Tabs</h3>

    {% set hoteles_tab %}
    <div class="container" style="padding-top:12px">
        <div class="row">
            <div class="col-md-12"><p>Soy de Hoteles</p>
            </div>
        </div>
    </div>
    {% endset %}

    {% set vuelos_tab %}
    <div class="container" style="padding-top:12px">
        <div class="row">
            <div class="col-md-12"><p>Soy de Vuelos</p>
            </div>
        </div>
    </div>
    {% endset %}

    {% set viajes_tab %}
    <div class="container" style="padding-top:12px">
        <div class="row">
            <div class="col-md-12"><p>Soy de Viajes</p>
            </div>
        </div>
    </div>
    {% endset %}

    {{
        tabs
        (
          {"vuelos" : "Vuelos", "hoteles" : "Hoteles", "viajes": "<span class='fa fa-github'></span> Viajes"},
          {"vuelos" : vuelos_tab, "hoteles" : hoteles_tab, "viajes": viajes_tab},
          "viajes"
        )
    }}
</div>
```

#### Social Buttons

**Social Login button**

- **Macro**: `login.twitter(text, args)` (any network listed below)
- **Attributes**:
  - **text** : A string.
  - **args** : attributes for the anchor tag.
  
```twig
{% import '@bootstrap/components/social/login.html.twig' as login %}

<div class="row-fluid">
  <h4>Sign in</h4>
  <div style="width:200px; padding:12px 0">
      {{ login.twitter('Sign in Twitter') }}
      {{ login.facebook('Sign in with Facebook') }}
      {{ login.google('Sign in with Google') }}
      {{ login.linkedin('Sign in with Linkedin') }}
  </div>
</div>        
```

The following function names representing social networks are available: 

- login.appnet
- login.bitbucket
- login.dropbox
- facebook
- login.flickr
- login.foursquare
- login.github 
- login.google
- login.instagram
- login.linkedin
- login.microsoft
- login.odnoklassniki
- login.openid
- login.pinterest
- login.reddit
- login.soundcloud
- login.tumblr
- login.twitter
- login.vimeo
- login.vk 
- login.yahoo


#### Social Share button

- **Macro**: `share_button(shares)`
- **Attributes**:
  - **shares** : expects an `array` of `social.*()` macros.


```twig
{% import '@bootstrap/components/social/share.html.twig' as social %}
{% from '@bootstrap/components/social/share_button.html.twig' import share_button as share %}

<div class="row-fluid">
  <h4>Simple buttons</h4>
  <div style="width:190px; padding:12px 0">
    {% set social_data  = {'href': 'http://localhost:8000/'} %}
    
    {% set twitter_social_data  = {
      'twitter' : 'niluspc', 
      'twitter_text' : 'News header'
    } %}
  
    {{ social.twitter(twitter_social_data|merge(social_data)) }}
    {{ social.facebook(social_data) }}
    <!-- More networks -->
    {{ share([
        social.google(social_data), 
        social.linkedin(social_data),
        social.pinterest(social_data)
      ]) 
    }}
  </div>
</div>   
```

----------------



## To do:

- Add the bootstrap and flatUI files to its directories with all its assets.
- Add a layer to clean up included CSS and remove duplicate declarations and minify its output.
