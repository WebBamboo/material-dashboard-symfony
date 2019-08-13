{% extends "@MaterialDashboard/base.html.twig" %}

{% block meta_title %}Hello {{ controller_name }}!{% endblock %}

{% block body %}
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-header card-header-warning">
                        <h4 class="card-title">Hello {{ controller_name }}! ✅</h4>
                    </div>
                    <div class="card-body">
                        This friendly message is coming from:
                        <ul>
                            <li>Your controller at <code><?= $helper->getFileLink("$root_directory/$controller_path", "$controller_path"); ?></code></li>
                            <li>Your template at <code><?= $helper->getFileLink("$root_directory/$relative_path", "$relative_path"); ?></code></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{% endblock %}