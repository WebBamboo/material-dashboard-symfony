{% extends "@MaterialDashboard/base.html.twig" %}

{% block meta_title %}<?= $entity_class_name ?> index{% endblock %}

{% block body %}
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="card">
                        <div class="card-header card-header-warning">
                        <h4 class="card-title"><?= $entity_class_name ?> index <a href="{{ path('<?= $route_name ?>_new') }}" class="btn btn-primary pull-right">Create new</a></h4>
                        </div>
                        <div class="card-body table-responsive">
                            <table class="table table-hover">
                                <thead class="text-warning">
                                    <tr>
<?php foreach ($entity_fields as $field): ?>
                                        <th><?= ucfirst($field['fieldName']) ?></th>
<?php endforeach; ?>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {% for <?= $entity_twig_var_singular ?> in <?= $entity_twig_var_plural ?> %}
                                    <tr>
<?php foreach ($entity_fields as $field): ?>
                                        <td>{{ <?= $helper->getEntityFieldPrintCode($entity_twig_var_singular, $field) ?> }}</td>
<?php endforeach; ?>
                                        <td>
                                            <a href="{{ path('<?= $route_name ?>_show', {'<?= $entity_identifier ?>': <?= $entity_twig_var_singular ?>.<?= $entity_identifier ?>}) }}" class="btn btn-success">Show</a>
                                            <a href="{{ path('<?= $route_name ?>_edit', {'<?= $entity_identifier ?>': <?= $entity_twig_var_singular ?>.<?= $entity_identifier ?>}) }}" class="btn btn-info">Edit</a>
                                        </td>
                                    </tr>
                                    {% else %}
                                    <tr>
                                        <td colspan="<?= (count($entity_fields) + 1) ?>">no records found</td>
                                    </tr>
                                    {% endfor %}
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
{% endblock %}
