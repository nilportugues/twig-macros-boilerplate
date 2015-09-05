# Twig macros as building blocks

### Technology stack

HTML5, Javascript (Jquery), Bootstrap 3.2 and FlatUI theme, Twig from Sensiolabs

<br>

### Social Buttons

**Social Login button**

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


**Social Share button**

```twig
{% import '@bootstrap/components/social/share.html.twig' as share %}
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
