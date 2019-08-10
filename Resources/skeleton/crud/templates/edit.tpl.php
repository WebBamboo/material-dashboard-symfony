{% extends '@MaterialDashboard/base.html.twig' %}

{% block title %}Edit <?= $entity_class_name ?>{% endblock %}

{% block body %}
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="card ">
                        <div class="card-header card-header-tabs card-header-primary">
                            <div class="nav-tabs-navigation">
                                <div class="nav-tabs-wrapper">
                                    <span class="nav-tabs-title">Edit <?= $entity_class_name ?>:</span>
                                    <ul class="nav nav-tabs" data-tabs="tabs">
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ path('<?= $route_name ?>_index') }}">
                                                <i class="material-icons">reply</i> Back to list
                                                <div class="ripple-container"></div>
                                                <div class="ripple-container"></div>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#" id="deleteTrigger">
                                                <i class="material-icons">delete_sweep</i> Delete
                                                <div class="ripple-container"></div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-body ">
                            {{ include('<?= $route_name ?>/_form.html.twig', {'button_label': 'Update'}) }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{ include('<?= $route_name ?>/_delete_form.html.twig') }}
{% endblock %}
{% block javascripts %}
    {{ parent() }}
    <script>
    $(document).ready(function() {
        $("#deleteTrigger").on('click', function() {
            $("#deleteForm").submit();
        });
    });
    </script>
{% endblock %}