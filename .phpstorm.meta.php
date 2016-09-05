<?php
	namespace PHPSTORM_META {
	/** @noinspection PhpUnusedLocalVariableInspection */
	/** @noinspection PhpIllegalArrayKeyTypeInspection */
	$STATIC_METHOD_TYPES = [

		\D('') => [
			'Adv' instanceof Think\Model\AdvModel,
			'Mongo' instanceof Think\Model\MongoModel,
			'View' instanceof Think\Model\ViewModel,
			'Category' instanceof Admin\Model\CategoryModel,
			'Relation' instanceof Think\Model\RelationModel,
			'Attribute' instanceof Admin\Model\AttributeModel,
			'Role' instanceof Admin\Model\RoleModel,
			'Brand' instanceof Admin\Model\BrandModel,
			'Admin' instanceof Admin\Model\AdminModel,
			'Goods' instanceof Admin\Model\GoodsModel,
			'Arthority' instanceof Admin\Model\ArthorityModel,
			'Merge' instanceof Think\Model\MergeModel,
		],
	];
}