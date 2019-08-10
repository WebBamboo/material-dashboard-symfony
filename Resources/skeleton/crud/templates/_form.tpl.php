{{ form_start(form) }}
    {{ form_widget(form,  { 'attr': {'class': 'form-horizontal'} }) }}
    <button class="btn">{{ button_label|default('Save') }}</button>
{{ form_end(form) }}
