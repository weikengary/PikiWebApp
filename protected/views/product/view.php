<?php
/* @var $this ProductController */
/* @var $model Product */

$this->breadcrumbs = array(
    'Products' => array('index'),
    $model->name,
);

$this->menu = array(
    array('label' => 'List Product', 'url' => array('index')),
    //array('label' => 'Manage Product', 'url' => array('admin')),
);
if(Yii::app()->user->checkAccess('createProduct',array('user'=>$model)))
{
        $this->menu[] = array('label' => 'Create Product', 'url' => array('create'));
	$this->menu[] = array('label' => 'Update Product', 'url' => array('update', 'id' => $model->id));
	$this->menu[] = array('label' => 'Delete Product', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?'));
	//$this->menu[] =array('label'=>'Manage User', 'url'=>array('admin'));        
}

if (Yii::app()->user->checkAccess('createUser', array('product' => $model))) {
    $this->menu[] = array('label' => 'Add User To Product',
        'url' => array('adduser', 'id' => $model->id));
}
?>

<h1>View Product #<?php echo $model->id; ?></h1>

<?php
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        'id',
        'name',
        'description',
        'parentid',
    ),
));
?>
