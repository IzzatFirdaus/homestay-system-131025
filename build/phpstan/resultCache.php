<?php declare(strict_types = 1);

return [
	'lastFullAnalysisTime' => 1760341102,
	'meta' => array (
  'cacheVersion' => 'v12-linesToIgnore',
  'phpstanVersion' => '2.1.31',
  'metaExtensions' => 
  array (
  ),
  'phpVersion' => 80212,
  'projectConfig' => '{conditionalTags: {Larastan\\Larastan\\Rules\\NoEnvCallsOutsideOfConfigRule: {phpstan.rules.rule: %noEnvCallsOutsideOfConfig%}, Larastan\\Larastan\\Rules\\NoModelMakeRule: {phpstan.rules.rule: %noModelMake%}, Larastan\\Larastan\\Rules\\NoUnnecessaryCollectionCallRule: {phpstan.rules.rule: %noUnnecessaryCollectionCall%}, Larastan\\Larastan\\Rules\\NoUnnecessaryEnumerableToArrayCallsRule: {phpstan.rules.rule: %noUnnecessaryEnumerableToArrayCalls%}, Larastan\\Larastan\\Rules\\OctaneCompatibilityRule: {phpstan.rules.rule: %checkOctaneCompatibility%}, Larastan\\Larastan\\Rules\\UnusedViewsRule: {phpstan.rules.rule: %checkUnusedViews%}, Larastan\\Larastan\\Rules\\NoMissingTranslationsRule: {phpstan.rules.rule: %checkMissingTranslations%}, Larastan\\Larastan\\Rules\\ModelAppendsRule: {phpstan.rules.rule: %checkModelAppends%}, Larastan\\Larastan\\Rules\\NoPublicModelScopeAndAccessorRule: {phpstan.rules.rule: %checkModelMethodVisibility%}, Larastan\\Larastan\\Rules\\NoAuthFacadeInRequestScopeRule: {phpstan.rules.rule: %checkAuthCallsWhenInRequestScope%}, Larastan\\Larastan\\Rules\\NoAuthHelperInRequestScopeRule: {phpstan.rules.rule: %checkAuthCallsWhenInRequestScope%}, Larastan\\Larastan\\ReturnTypes\\Helpers\\EnvFunctionDynamicFunctionReturnTypeExtension: {phpstan.broker.dynamicFunctionReturnTypeExtension: %generalizeEnvReturnType%}, Larastan\\Larastan\\ReturnTypes\\Helpers\\ConfigFunctionDynamicFunctionReturnTypeExtension: {phpstan.broker.dynamicFunctionReturnTypeExtension: %checkConfigTypes%}, Larastan\\Larastan\\ReturnTypes\\ConfigRepositoryDynamicMethodReturnTypeExtension: {phpstan.broker.dynamicMethodReturnTypeExtension: %checkConfigTypes%}, Larastan\\Larastan\\ReturnTypes\\ConfigFacadeCollectionDynamicStaticMethodReturnTypeExtension: {phpstan.broker.dynamicStaticMethodReturnTypeExtension: %checkConfigTypes%}, Larastan\\Larastan\\Rules\\ConfigCollectionRule: {phpstan.rules.rule: %checkConfigTypes%}}, parameters: {universalObjectCratesClasses: [Illuminate\\Http\\Request, Illuminate\\Support\\Optional, Illuminate\\Support\\Fluent], earlyTerminatingFunctionCalls: [abort, dd], mixinExcludeClasses: [Eloquent], bootstrapFiles: [bootstrap.php], checkOctaneCompatibility: false, noEnvCallsOutsideOfConfig: true, noModelMake: true, noUnnecessaryCollectionCall: true, noUnnecessaryCollectionCallOnly: [], noUnnecessaryCollectionCallExcept: [], noUnnecessaryEnumerableToArrayCalls: false, squashedMigrationsPath: [], databaseMigrationsPath: [], disableMigrationScan: false, disableSchemaScan: false, configDirectories: [], viewDirectories: [], translationDirectories: [], checkModelProperties: true, checkUnusedViews: false, checkMissingTranslations: false, checkModelAppends: true, checkModelMethodVisibility: false, generalizeEnvReturnType: false, checkConfigTypes: false, checkAuthCallsWhenInRequestScope: false, level: max, paths: [C:\\xampp\\htdocs\\homestay-system-131025\\app, C:\\xampp\\htdocs\\homestay-system-131025\\bootstrap, C:\\xampp\\htdocs\\homestay-system-131025\\config, C:\\xampp\\htdocs\\homestay-system-131025\\database, C:\\xampp\\htdocs\\homestay-system-131025\\routes], tmpDir: C:\\xampp\\htdocs\\homestay-system-131025\\build\\phpstan, treatPhpDocTypesAsCertain: false, scanDirectories: [vendor/laravel/framework/src, vendor/spatie/laravel-permission/src, vendor/maatwebsite/excel/src], stubFiles: [build/phpstan/stubs/laravel-stubs.php]}, rules: [Larastan\\Larastan\\Rules\\UselessConstructs\\NoUselessWithFunctionCallsRule, Larastan\\Larastan\\Rules\\UselessConstructs\\NoUselessValueFunctionCallsRule, Larastan\\Larastan\\Rules\\DeferrableServiceProviderMissingProvidesRule, Larastan\\Larastan\\Rules\\ConsoleCommand\\UndefinedArgumentOrOptionRule], services: [{class: Larastan\\Larastan\\Methods\\RelationForwardsCallsExtension, tags: [phpstan.broker.methodsClassReflectionExtension]}, {class: Larastan\\Larastan\\Methods\\ModelForwardsCallsExtension, tags: [phpstan.broker.methodsClassReflectionExtension]}, {class: Larastan\\Larastan\\Methods\\EloquentBuilderForwardsCallsExtension, tags: [phpstan.broker.methodsClassReflectionExtension]}, {class: Larastan\\Larastan\\Methods\\HigherOrderTapProxyExtension, tags: [phpstan.broker.methodsClassReflectionExtension]}, {class: Larastan\\Larastan\\Methods\\HigherOrderCollectionProxyExtension, tags: [phpstan.broker.methodsClassReflectionExtension]}, {class: Larastan\\Larastan\\Methods\\StorageMethodsClassReflectionExtension, tags: [phpstan.broker.methodsClassReflectionExtension]}, {class: Larastan\\Larastan\\Methods\\Extension, tags: [phpstan.broker.methodsClassReflectionExtension]}, {class: Larastan\\Larastan\\Methods\\ModelFactoryMethodsClassReflectionExtension, tags: [phpstan.broker.methodsClassReflectionExtension]}, {class: Larastan\\Larastan\\Methods\\RedirectResponseMethodsClassReflectionExtension, tags: [phpstan.broker.methodsClassReflectionExtension]}, {class: Larastan\\Larastan\\Methods\\MacroMethodsClassReflectionExtension, tags: [phpstan.broker.methodsClassReflectionExtension]}, {class: Larastan\\Larastan\\Methods\\ViewWithMethodsClassReflectionExtension, tags: [phpstan.broker.methodsClassReflectionExtension]}, {class: Larastan\\Larastan\\Properties\\ModelAccessorExtension, tags: [phpstan.broker.propertiesClassReflectionExtension]}, {class: Larastan\\Larastan\\Properties\\ModelPropertyExtension, tags: [phpstan.broker.propertiesClassReflectionExtension]}, {class: Larastan\\Larastan\\Properties\\HigherOrderCollectionProxyPropertyExtension, tags: [phpstan.broker.propertiesClassReflectionExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\HigherOrderTapProxyExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\ContainerArrayAccessDynamicMethodReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension], arguments: {className: Illuminate\\Contracts\\Container\\Container}}, {class: Larastan\\Larastan\\ReturnTypes\\ContainerArrayAccessDynamicMethodReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension], arguments: {className: Illuminate\\Container\\Container}}, {class: Larastan\\Larastan\\ReturnTypes\\ContainerArrayAccessDynamicMethodReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension], arguments: {className: Illuminate\\Foundation\\Application}}, {class: Larastan\\Larastan\\ReturnTypes\\ContainerArrayAccessDynamicMethodReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension], arguments: {className: Illuminate\\Contracts\\Foundation\\Application}}, {class: Larastan\\Larastan\\Properties\\ModelRelationsExtension, tags: [phpstan.broker.propertiesClassReflectionExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\ModelOnlyDynamicMethodReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\ModelFactoryDynamicStaticMethodReturnTypeExtension, tags: [phpstan.broker.dynamicStaticMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\ModelDynamicStaticMethodReturnTypeExtension, tags: [phpstan.broker.dynamicStaticMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\AppMakeDynamicReturnTypeExtension, tags: [phpstan.broker.dynamicStaticMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\AuthExtension, tags: [phpstan.broker.dynamicStaticMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\GuardDynamicStaticMethodReturnTypeExtension, tags: [phpstan.broker.dynamicStaticMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\AuthManagerExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\DateExtension, tags: [phpstan.broker.dynamicStaticMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\GuardExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\RequestFileExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\RequestRouteExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\RequestUserExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\EloquentBuilderExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\RelationCollectionExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\TestCaseExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\Support\\CollectionHelper}, {class: Larastan\\Larastan\\ReturnTypes\\Helpers\\AuthExtension, tags: [phpstan.broker.dynamicFunctionReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\Helpers\\CollectExtension, tags: [phpstan.broker.dynamicFunctionReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\Helpers\\NowAndTodayExtension, tags: [phpstan.broker.dynamicFunctionReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\Helpers\\ResponseExtension, tags: [phpstan.broker.dynamicFunctionReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\Helpers\\ValidatorExtension, tags: [phpstan.broker.dynamicFunctionReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\Helpers\\LiteralExtension, tags: [phpstan.broker.dynamicFunctionReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\CollectionFilterRejectDynamicReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\CollectionWhereNotNullDynamicReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\NewModelQueryDynamicMethodReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\FactoryDynamicMethodReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\Types\\AbortIfFunctionTypeSpecifyingExtension, tags: [phpstan.typeSpecifier.functionTypeSpecifyingExtension], arguments: {methodName: abort, negate: false}}, {class: Larastan\\Larastan\\Types\\AbortIfFunctionTypeSpecifyingExtension, tags: [phpstan.typeSpecifier.functionTypeSpecifyingExtension], arguments: {methodName: abort, negate: true}}, {class: Larastan\\Larastan\\Types\\AbortIfFunctionTypeSpecifyingExtension, tags: [phpstan.typeSpecifier.functionTypeSpecifyingExtension], arguments: {methodName: throw, negate: false}}, {class: Larastan\\Larastan\\Types\\AbortIfFunctionTypeSpecifyingExtension, tags: [phpstan.typeSpecifier.functionTypeSpecifyingExtension], arguments: {methodName: throw, negate: true}}, {class: Larastan\\Larastan\\ReturnTypes\\Helpers\\AppExtension, tags: [phpstan.broker.dynamicFunctionReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\Helpers\\ValueExtension, tags: [phpstan.broker.dynamicFunctionReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\Helpers\\StrExtension, tags: [phpstan.broker.dynamicFunctionReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\Helpers\\TapExtension, tags: [phpstan.broker.dynamicFunctionReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\StorageDynamicStaticMethodReturnTypeExtension, tags: [phpstan.broker.dynamicStaticMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\Types\\GenericEloquentCollectionTypeNodeResolverExtension, tags: [phpstan.phpDoc.typeNodeResolverExtension]}, {class: Larastan\\Larastan\\Types\\ViewStringTypeNodeResolverExtension, tags: [phpstan.phpDoc.typeNodeResolverExtension]}, {class: Larastan\\Larastan\\Rules\\OctaneCompatibilityRule}, {class: Larastan\\Larastan\\Rules\\NoEnvCallsOutsideOfConfigRule, arguments: {configDirectories: %configDirectories%}}, {class: Larastan\\Larastan\\Rules\\NoModelMakeRule}, {class: Larastan\\Larastan\\Rules\\NoUnnecessaryCollectionCallRule, arguments: {onlyMethods: %noUnnecessaryCollectionCallOnly%, excludeMethods: %noUnnecessaryCollectionCallExcept%}}, {class: Larastan\\Larastan\\Rules\\NoUnnecessaryEnumerableToArrayCallsRule}, {class: Larastan\\Larastan\\Rules\\ModelAppendsRule}, {class: Larastan\\Larastan\\Rules\\NoPublicModelScopeAndAccessorRule}, {class: Larastan\\Larastan\\Types\\GenericEloquentBuilderTypeNodeResolverExtension, tags: [phpstan.phpDoc.typeNodeResolverExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\AppEnvironmentReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension], arguments: {class: Illuminate\\Foundation\\Application}}, {class: Larastan\\Larastan\\ReturnTypes\\AppEnvironmentReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension], arguments: {class: Illuminate\\Contracts\\Foundation\\Application}}, {class: Larastan\\Larastan\\ReturnTypes\\AppFacadeEnvironmentReturnTypeExtension, tags: [phpstan.broker.dynamicStaticMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\Types\\ModelProperty\\ModelPropertyTypeNodeResolverExtension, tags: [phpstan.phpDoc.typeNodeResolverExtension], arguments: {active: %checkModelProperties%}}, {class: Larastan\\Larastan\\Types\\CollectionOf\\CollectionOfTypeNodeResolverExtension, tags: [phpstan.phpDoc.typeNodeResolverExtension]}, {class: Larastan\\Larastan\\Properties\\MigrationHelper, arguments: {databaseMigrationPath: %databaseMigrationsPath%, disableMigrationScan: %disableMigrationScan%, parser: @currentPhpVersionSimpleDirectParser, reflectionProvider: @reflectionProvider}}, {class: Larastan\\Larastan\\Properties\\SquashedMigrationHelper, arguments: {schemaPaths: %squashedMigrationsPath%, disableSchemaScan: %disableSchemaScan%}}, {class: Larastan\\Larastan\\Properties\\ModelCastHelper}, {class: Larastan\\Larastan\\Properties\\ModelPropertyHelper}, {class: Larastan\\Larastan\\Rules\\ModelRuleHelper}, {class: Larastan\\Larastan\\Methods\\BuilderHelper, arguments: {checkProperties: %checkModelProperties%}}, {class: Larastan\\Larastan\\Rules\\RelationExistenceRule, tags: [phpstan.rules.rule]}, {class: Larastan\\Larastan\\Rules\\CheckDispatchArgumentTypesCompatibleWithClassConstructorRule, arguments: {dispatchableClass: Illuminate\\Foundation\\Bus\\Dispatchable}, tags: [phpstan.rules.rule]}, {class: Larastan\\Larastan\\Rules\\CheckDispatchArgumentTypesCompatibleWithClassConstructorRule, arguments: {dispatchableClass: Illuminate\\Foundation\\Events\\Dispatchable}, tags: [phpstan.rules.rule]}, {class: Larastan\\Larastan\\Properties\\Schema\\MySqlDataTypeToPhpTypeConverter}, {class: Larastan\\Larastan\\LarastanStubFilesExtension, tags: [phpstan.stubFilesExtension]}, {class: Larastan\\Larastan\\Rules\\UnusedViewsRule}, {class: Larastan\\Larastan\\Collectors\\UsedViewFunctionCollector, tags: [phpstan.collector]}, {class: Larastan\\Larastan\\Collectors\\UsedEmailViewCollector, tags: [phpstan.collector]}, {class: Larastan\\Larastan\\Collectors\\UsedViewMakeCollector, tags: [phpstan.collector]}, {class: Larastan\\Larastan\\Collectors\\UsedViewFacadeMakeCollector, tags: [phpstan.collector]}, {class: Larastan\\Larastan\\Collectors\\UsedRouteFacadeViewCollector, tags: [phpstan.collector]}, {class: Larastan\\Larastan\\Collectors\\UsedViewInAnotherViewCollector}, {class: Larastan\\Larastan\\Support\\ViewFileHelper, arguments: {viewDirectories: %viewDirectories%}}, {class: Larastan\\Larastan\\Support\\ViewParser, arguments: {parser: @currentPhpVersionSimpleDirectParser}}, {class: Larastan\\Larastan\\Rules\\NoMissingTranslationsRule, arguments: {translationDirectories: %translationDirectories%}}, {class: Larastan\\Larastan\\Collectors\\UsedTranslationFunctionCollector, tags: [phpstan.collector]}, {class: Larastan\\Larastan\\Collectors\\UsedTranslationTranslatorCollector, tags: [phpstan.collector]}, {class: Larastan\\Larastan\\Collectors\\UsedTranslationFacadeCollector, tags: [phpstan.collector]}, {class: Larastan\\Larastan\\Collectors\\UsedTranslationViewCollector}, {class: Larastan\\Larastan\\ReturnTypes\\ApplicationMakeDynamicReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\ContainerMakeDynamicReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\ConsoleCommand\\ArgumentDynamicReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\ConsoleCommand\\HasArgumentDynamicReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\ConsoleCommand\\OptionDynamicReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\ConsoleCommand\\HasOptionDynamicReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\TranslatorGetReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\LangGetReturnTypeExtension, tags: [phpstan.broker.dynamicStaticMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\TransHelperReturnTypeExtension, tags: [phpstan.broker.dynamicFunctionReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\DoubleUnderscoreHelperReturnTypeExtension, tags: [phpstan.broker.dynamicFunctionReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\AppMakeHelper}, {class: Larastan\\Larastan\\Internal\\ConsoleApplicationResolver}, {class: Larastan\\Larastan\\Internal\\ConsoleApplicationHelper}, {class: Larastan\\Larastan\\Support\\HigherOrderCollectionProxyHelper}, {class: Larastan\\Larastan\\ReturnTypes\\Helpers\\ConfigFunctionDynamicFunctionReturnTypeExtension}, {class: Larastan\\Larastan\\ReturnTypes\\ConfigRepositoryDynamicMethodReturnTypeExtension}, {class: Larastan\\Larastan\\ReturnTypes\\ConfigFacadeCollectionDynamicStaticMethodReturnTypeExtension}, {class: Larastan\\Larastan\\Support\\ConfigParser, arguments: {parser: @currentPhpVersionSimpleDirectParser, configPaths: %configDirectories%}}, {class: Larastan\\Larastan\\Internal\\ConfigHelper}, {class: Larastan\\Larastan\\ReturnTypes\\Helpers\\EnvFunctionDynamicFunctionReturnTypeExtension}, {class: Larastan\\Larastan\\ReturnTypes\\FormRequestSafeDynamicMethodReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\Rules\\NoAuthFacadeInRequestScopeRule}, {class: Larastan\\Larastan\\Rules\\NoAuthHelperInRequestScopeRule}, {class: Larastan\\Larastan\\Rules\\ConfigCollectionRule}, {class: Illuminate\\Filesystem\\Filesystem, autowired: self}]}',
  'analysedPaths' => 
  array (
    0 => 'C:\\xampp\\htdocs\\homestay-system-131025\\app',
    1 => 'C:\\xampp\\htdocs\\homestay-system-131025\\bootstrap',
    2 => 'C:\\xampp\\htdocs\\homestay-system-131025\\config',
    3 => 'C:\\xampp\\htdocs\\homestay-system-131025\\database',
    4 => 'C:\\xampp\\htdocs\\homestay-system-131025\\routes',
  ),
  'scannedFiles' => 
  array (
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Auth\\Access\\AuthorizationException.php' => '6b15a91d82efdb2aeee8c10c3e25fe36e072d45f',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Auth\\Access\\Events\\GateEvaluated.php' => '0667e9660018b5f95b84dd98978f3cf08589de00',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Auth\\Access\\Gate.php' => '1924b4146a6818c700bb4ea73d3491b8e06f42c8',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Auth\\Access\\HandlesAuthorization.php' => '0f22ff05bf516e7c47ef8868da34761151fc32ef',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Auth\\Access\\Response.php' => 'e5fc1c08510e9a390915703147210defb8ec3c65',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Auth\\AuthManager.php' => '68e169af3f0f51fa0939fca29078e87b30fef3ed',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Auth\\AuthServiceProvider.php' => 'cd4f520d5ed3f7b29167010f34666af935b045d2',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Auth\\Authenticatable.php' => '113dbdcff254278e18ff0da6fb3f9354ff54ed3a',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Auth\\AuthenticationException.php' => '8e7af8c8b12844cf60b112f449b32737463fbd5e',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Auth\\Console\\ClearResetsCommand.php' => '4de2d9b2e4a797b79d7e1d9de00779dd9bf35e61',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Auth\\CreatesUserProviders.php' => 'd21641db798ca15de961778497e55757313fd1c7',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Auth\\DatabaseUserProvider.php' => '98f6b513f83fede0e984d4f8927204b08280328b',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Auth\\EloquentUserProvider.php' => '5eb7550f37fbeda04dabbf5a7b80db34d09b5012',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Auth\\Events\\Attempting.php' => 'c502c637a3f32e7fb0595e06318e6b3edcd2acc6',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Auth\\Events\\Authenticated.php' => '691ec3cf112ec26ac97f27a0054e8a66c892e382',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Auth\\Events\\CurrentDeviceLogout.php' => 'b84c85351032f994f42603d5f590ca4860c3ffda',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Auth\\Events\\Failed.php' => '2912346767836c743c491d7570dbd4adca496af1',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Auth\\Events\\Lockout.php' => '10d0d071d8a5e9dc06c34caa5d909fb525b072a9',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Auth\\Events\\Login.php' => '631a15b7e47bf0026d9416f43be381bb445d1980',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Auth\\Events\\Logout.php' => '3fe8e5859182c77cae0147c6183d1f45e56c270b',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Auth\\Events\\OtherDeviceLogout.php' => 'd1e916aca9c01b52f9ffa2ce2c11adaee0bdcfc9',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Auth\\Events\\PasswordReset.php' => 'ca410124e8b415510cfcb565d5fd87dcbc12e342',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Auth\\Events\\PasswordResetLinkSent.php' => 'cfe93b21ae3797ddd9b8380a492f54b71633b4e3',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Auth\\Events\\Registered.php' => '9b5c4ea685b13d3c697ddbebf0dc4ea92549788f',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Auth\\Events\\Validated.php' => '4dfaefbde34b3c8ce30f2bd63d15e72d2e31008a',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Auth\\Events\\Verified.php' => '3a0a3957c3f4492da6f1e452eba48d725926e738',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Auth\\GenericUser.php' => 'c7948879307f1e14da9112ed82dbb737a664c775',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Auth\\GuardHelpers.php' => '5d8a82113251670c1c06ef8970fd8fd5970c5583',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Auth\\Listeners\\SendEmailVerificationNotification.php' => '6bfe792e279cd369e85f5664de3944540881e6cf',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Auth\\Middleware\\Authenticate.php' => '3a97d30ca0c41498b21e3566cc84d6f7726b68f4',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Auth\\Middleware\\AuthenticateWithBasicAuth.php' => '6adac48ca8c7bccf0af31ae59764f890e16124f3',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Auth\\Middleware\\Authorize.php' => 'dee3293764fcd7c79ea15c9b554a774cff7fc220',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Auth\\Middleware\\EnsureEmailIsVerified.php' => 'a397f36fbe68be205d7c04e15e7f542531327e30',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Auth\\Middleware\\RedirectIfAuthenticated.php' => '8d630573a8c295e332868ae196ac5a6c2ed84fb4',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Auth\\Middleware\\RequirePassword.php' => '98bdd16f44ef1cf75836898f6586f5e6b6f50b17',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Auth\\MustVerifyEmail.php' => 'e0bea7e5557dfec7850967194779805bec6643b6',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Auth\\Notifications\\ResetPassword.php' => '89e85896a52316d77177da6afe800cb2c68bafcf',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Auth\\Notifications\\VerifyEmail.php' => '804b1c3cda6259266ed2c0da4eb6061b725a1a5c',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Auth\\Passwords\\CacheTokenRepository.php' => 'c4f6653fd9a6e86c599b2e1bf8e2d3cf477abb06',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Auth\\Passwords\\CanResetPassword.php' => '111910ff7d9bac6ea8d013fcd6d12ad164e2d171',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Auth\\Passwords\\DatabaseTokenRepository.php' => '25e5839f3f3d9e1faeaeaae0b3a4c11cda917b31',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Auth\\Passwords\\PasswordBroker.php' => 'b05784be56fdbd551e09506d6eb1c31484b8e0dc',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Auth\\Passwords\\PasswordBrokerManager.php' => '54d469872e199fc073ab3921c80a9f986b66417f',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Auth\\Passwords\\PasswordResetServiceProvider.php' => '881b5ab81b35a0b7be5dc969b1f40c52f70e2868',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Auth\\Passwords\\TokenRepositoryInterface.php' => '6c6f35ff30dcf824cc93b37846d97caafb200320',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Auth\\Recaller.php' => 'dd56e45cbe71e076219ca98f33db8c78a9c599eb',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Auth\\RequestGuard.php' => 'eb48c299c5f4f089e69cc343eebd86a6a85011d0',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Auth\\SessionGuard.php' => 'f760a6a9f78d4f21ebbe1a148a477ec897fe0d90',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Auth\\TokenGuard.php' => 'efd05e043e9b13bb8ee9e82e75be126a846c1026',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Broadcasting\\AnonymousEvent.php' => 'ba7b3af39365b9383f6c6866bdde2c489001160d',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Broadcasting\\BroadcastController.php' => '5e2e69cd9874513b1d1fdf0a8ec138432b9394be',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Broadcasting\\BroadcastEvent.php' => 'aa8ca980ff23368eb549a32ae73c29084c591bdb',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Broadcasting\\BroadcastException.php' => 'eb15a093f1b060ffc32411b34ce6ba183715bf3f',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Broadcasting\\BroadcastManager.php' => '014086a551a7353c339444a1591fbd6f63ae0645',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Broadcasting\\BroadcastServiceProvider.php' => '9250d5549ef27adbb4e150972c4c4a6be0c1803b',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Broadcasting\\Broadcasters\\AblyBroadcaster.php' => '04483a69a8c6bc925a1e86e3197699f8d2fbd8eb',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Broadcasting\\Broadcasters\\Broadcaster.php' => '25af1b1b9d9166da658da05af491cdbcac54186b',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Broadcasting\\Broadcasters\\LogBroadcaster.php' => 'd28e6130b3a52134432428a1e29ede8bbb4ad16a',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Broadcasting\\Broadcasters\\NullBroadcaster.php' => '003a86e1aec996a96d9e43e3d3b63462fa3c745c',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Broadcasting\\Broadcasters\\PusherBroadcaster.php' => '6e5f93ace088bb03fb89ab03f6f4c7095152d0b5',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Broadcasting\\Broadcasters\\RedisBroadcaster.php' => '1231cd20e3eafa9756d0ec0f48f5505e5c4efdc4',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Broadcasting\\Broadcasters\\UsePusherChannelConventions.php' => '8d11ef05b124449a2d95ae8975501776eccacbd2',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Broadcasting\\Channel.php' => 'bdee915dfca5dce642931fb5e029f69586aa7ab7',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Broadcasting\\EncryptedPrivateChannel.php' => 'd6c3c8720765a4a51b935b52c7cddd55ee2e3c5e',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Broadcasting\\FakePendingBroadcast.php' => '0a956f65280a05958de4107bea0a1d385b194094',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Broadcasting\\InteractsWithBroadcasting.php' => 'cc6d930c682a488a8c27e1e407a217fb2310ac95',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Broadcasting\\InteractsWithSockets.php' => 'cf5657366b0950cd54a05b4bd08b3dd28f9599f8',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Broadcasting\\PendingBroadcast.php' => '4d78d7e24ddd901e459d7dbec27bacafe00cbe1d',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Broadcasting\\PresenceChannel.php' => '1bb06a18d75de5e014d29357a4a904e8388d5f2b',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Broadcasting\\PrivateChannel.php' => 'e01191dcc1728d5dda3c8f72b3837659042630ef',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Broadcasting\\UniqueBroadcastEvent.php' => '9886442f518436c1c319414a4193669ae5640ab4',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Batch.php' => 'fb3d4c369c2544cc2a59dc8061fc50113af63e03',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\BatchFactory.php' => 'c09f775f0ea761b7805195866f7a6dc0ece788ce',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\BatchRepository.php' => '8e390df34dd67d15525f3d2d2ce78a20d011fb8e',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Batchable.php' => '73a9816a24c662f1a8e01700c2d34629e93e5114',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\BusServiceProvider.php' => '1239fee311aef15356ee14cbe29c6b63967cd910',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\ChainedBatch.php' => '1c929ac05f597f403d786a0658a1a1eb428b204f',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\DatabaseBatchRepository.php' => 'a01c5bd070404e78d3bac91df1f901c7558cbc0f',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php' => '3f5140508cf2573b9dc240367dc14b0526c6a5b8',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\DynamoBatchRepository.php' => '8294c1fab14d8899db786b09b279a8993f4f9ee3',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Events\\BatchDispatched.php' => '25f411b4b71b95ba0f9144eb906a7104a0301c7d',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\PendingBatch.php' => 'b4771259d95e89f54c66fd4a9f8caaedad94c357',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\PrunableBatchRepository.php' => '37152e3e660f814581c1e256517bc47477e78c5a',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Queueable.php' => 'd88a921583866c14beca47de86b8780dcb4ea2ca',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\UniqueLock.php' => 'd7196790d7d932c018355128781f047c71af1938',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\UpdatedBatchJobCounts.php' => '141270834325787d9437ce5554694cc557e3abd9',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Cache\\ApcStore.php' => '6f615c8e4619e56008d065c730e969740d3244eb',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Cache\\ApcWrapper.php' => 'dd2b846821f8651fce82f2e522d4408ab640c091',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Cache\\ArrayLock.php' => '15e0f0314d7c886cdb2a2813c5605469169bcf03',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Cache\\ArrayStore.php' => 'ebb4ad491ab430edb46740f1fc4b3b4e3da184eb',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Cache\\CacheLock.php' => '5c582e6f96f7b3b80672348800380529dd705897',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Cache\\CacheManager.php' => '8f661be77a2601b6a3185fdc16fd6caede62faf1',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Cache\\CacheServiceProvider.php' => '996f5c4e50c0cbbd62005ca997858b667ad219c8',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Cache\\Console\\CacheTableCommand.php' => 'b7b75ca2a6a09ae3a653f90e7c67c09e71c8e394',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Cache\\Console\\ClearCommand.php' => '2651adee00a6d5304c381b0bd57ecc4adf40ca30',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Cache\\Console\\ForgetCommand.php' => 'a3554fbfa5d9a18f5e65bb45b65b7c1c14536a40',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Cache\\Console\\PruneStaleTagsCommand.php' => 'eef0e4713c700b510e278a8ff867c078e851b523',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Cache\\DatabaseLock.php' => 'e41fec949238f67f324d79bff34ab6065ebc0cdd',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Cache\\DatabaseStore.php' => 'b210033673b1341b229341424c3038b1f9d0196a',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Cache\\DynamoDbLock.php' => 'b35b8bafdd769b52f8f0cb80120c47fb9a80ae0f',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Cache\\DynamoDbStore.php' => '46de2e0c5f7881c72d7475d3c9b71d393f1b0854',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Cache\\Events\\CacheEvent.php' => '18865bb61380ed45878ff2e72bd02fec9c742e09',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Cache\\Events\\CacheFlushFailed.php' => 'b44bcc6e094bf20192bee61531cb2febb7fd4a18',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Cache\\Events\\CacheFlushed.php' => '87b9ab58b5dce4a848758cc0ea526abfe0613bed',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Cache\\Events\\CacheFlushing.php' => '7c593a15a93842b14a117411460561e902b94377',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Cache\\Events\\CacheHit.php' => '162f51696e61f491d7fbc6d6b8e55d1fae16883f',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Cache\\Events\\CacheMissed.php' => '7918c1b6493d3a2c88d8562c45593a5e4851a2d7',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Cache\\Events\\ForgettingKey.php' => '2cd7b9ebdcfd26056a553bd0cef1926b0b8fbcde',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Cache\\Events\\KeyForgetFailed.php' => '5827761d078bdf2ef0570eb6f62900d56e0c8b8d',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Cache\\Events\\KeyForgotten.php' => '6a619f998f367a63e1a0b34bea6a8c064de9bf0c',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Cache\\Events\\KeyWriteFailed.php' => 'f395c6545a349c36dd7b8c6bc25910d6b9fa6d30',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Cache\\Events\\KeyWritten.php' => 'f3bdad99c95434bce250880a91b6033718a09f06',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Cache\\Events\\RetrievingKey.php' => '9375e3f78f5d5357b5964fe7f179627dc0b0a9a0',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Cache\\Events\\RetrievingManyKeys.php' => '42207fabba0c20e8875cc425cb49c85a5a2b1827',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Cache\\Events\\WritingKey.php' => 'd2feb5571bd3b89586146a794fbe75f7d6ba46e8',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Cache\\Events\\WritingManyKeys.php' => '7598597a4816eda8a304365fd03b90186cf440a8',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Cache\\FileLock.php' => 'e5efe24e4e5216c06473132897b7624070a4c4a2',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Cache\\FileStore.php' => '82897a84d04d96ebe46d6b058bcd3fa713c3e7c6',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Cache\\HasCacheLock.php' => 'f8a849bfa1ba11cc1654acf536576518db7b936d',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Cache\\Lock.php' => '0042d2827ed6c090447cc00c2a6ef92f1e51ec1d',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Cache\\LuaScripts.php' => 'f8f2d362c0e97ad3ee215c75cbff29c220647f75',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Cache\\MemcachedConnector.php' => '61accefc5c7ddc6016d564b6f649c0c6f36ff949',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Cache\\MemcachedLock.php' => '8c59eeb3696e4710a131664af0ea74720ea99317',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Cache\\MemcachedStore.php' => '404cb76eeaa6d0902f73a78795fbb6e5583f8162',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Cache\\MemoizedStore.php' => '606c4b44c41563fe0f6f5521efca09bd78681685',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Cache\\NoLock.php' => '5a488d7493b02f008ea1e12ae684c0c9ce38d8fb',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Cache\\NullStore.php' => 'a88a01eb43b0f5335cb84d0b23d9df863173388e',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Cache\\PhpRedisLock.php' => '4a52358953ae2dc4fa7879ef3d0bf4b6e46730c9',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Cache\\RateLimiter.php' => '7849ca1955785c4029ab58c82c45125b2d24e7b0',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Cache\\RateLimiting\\GlobalLimit.php' => '976ef9ecd2f5172d990ef2fa233e9c07d5091add',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Cache\\RateLimiting\\Limit.php' => '29b0d8fb41e6425cac26d59274998a85e0d55309',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Cache\\RateLimiting\\Unlimited.php' => '522d7932809c3d54d359fe7f2858e85c5046bbef',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Cache\\RedisLock.php' => 'd31a2414a990a37d739ca94a998d56c8582f1445',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Cache\\RedisStore.php' => '849d469c758e946de489c87a29edcaecc8ecce00',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Cache\\RedisTagSet.php' => '3f61d3d475eea4bbc8e5b22bf13133a49253b94d',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Cache\\RedisTaggedCache.php' => 'c661ec547e65c4280e5658631b62ad43450fa790',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Cache\\Repository.php' => '39022d7b841fe297141b67a3afca9161e50ec606',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Cache\\RetrievesMultipleKeys.php' => '6ff0e5a1f140cbf28766ab1a4da058fc3236397d',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Cache\\SessionStore.php' => '39fdbd23e351700831742041c66d287ae1118b84',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Cache\\TagSet.php' => '1a006711c2836f5ec5253203d38cc6eaa4f70116',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Cache\\TaggableStore.php' => 'cf16f4bd378576050dae3c140519d81e99aa8272',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Cache\\TaggedCache.php' => '0738ee107395d48c489afa6cf3df21e22b128d32',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Collections\\Arr.php' => '8f2ec170e676ee2eb4c60f46d4f05ed5aa5daaca',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Collections\\Collection.php' => '0d0ecbaf643b8b4a1455bd4fd2b19d9b7cc8ba03',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Collections\\Enumerable.php' => '0a7a8d2c63d0cd900170c6f465b21bf7df6da26a',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Collections\\HigherOrderCollectionProxy.php' => '1eb05ec9cb334aa9636f85b4bb5f4292911bafdc',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Collections\\ItemNotFoundException.php' => '96e709ef45426062b5ab3d565d4182e936b3ed54',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Collections\\LazyCollection.php' => '6188dc6cfd708aefe835827cdcab8f375669341f',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Collections\\MultipleItemsFoundException.php' => 'febb1bd13a14433b9df7db02ae988aa14d6b89bf',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Collections\\Traits\\EnumeratesValues.php' => '7e80158a69a5d3db90da472cb280d0fc1233f980',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Collections\\Traits\\TransformsToResourceCollection.php' => 'a74ad35e5d4a2a981f1f75c11222dfc374a62305',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Collections\\functions.php' => '55383f756bd2b6a6df9748b976a403245d630ade',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Collections\\helpers.php' => '5bc6b3ff4ba3d8c5086e82ab2e5cd875771d898e',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Concurrency\\ConcurrencyManager.php' => '621418331daf0808f57ab2ee7674d5862c258164',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Concurrency\\ConcurrencyServiceProvider.php' => '0b7958c840952f62043d3d89676c081a92769cb7',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Concurrency\\Console\\InvokeSerializedClosureCommand.php' => '8af35d2416168d1ce9d7646f4198977884d81537',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Concurrency\\ForkDriver.php' => '9b119ab385b66e8e2a7e5af10b79f2d8a0a32f6b',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Concurrency\\ProcessDriver.php' => '53ac3236c7f50c349ea35a426e49d81d9b747b26',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Concurrency\\SyncDriver.php' => '1e6da179b720f2da1ee481769d471ea01b333b76',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Conditionable\\HigherOrderWhenProxy.php' => 'a03e11292d8649dcd3bf127c9dfcbe9103a44828',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Conditionable\\Traits\\Conditionable.php' => '61bc5a734053c773859f7d7142086ab55f125c77',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Config\\Repository.php' => '323de19794351b5503c53de941ef6fda9f8960d4',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php' => '1927d8b6e25f8163aa3789c15418fc74f8e409d2',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\BufferedConsoleOutput.php' => '8cfd1a079e3de69643ab7a14284af831087bb82a',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\CacheCommandMutex.php' => '9299bee903178e12ad83a29dea1e212d16455439',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php' => 'e0acd232508b7172b0b436f54a5fecb5bc15ac29',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\CommandMutex.php' => '1d70962f55c4a62dc9d7ad44311cd9fdd0a534e7',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Concerns\\CallsCommands.php' => 'bb86379dd80a3f93a140f96239cdc5c2fde876b1',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Concerns\\ConfiguresPrompts.php' => '333b468050f5d920672b67b67d290396db17cce6',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Concerns\\CreatesMatchingTest.php' => '789961db30b3c91363e7b893e8e6df3e9850ae70',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Concerns\\HasParameters.php' => 'b254c46853fc4b22101b36e50b1922299d785e27',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Concerns\\InteractsWithIO.php' => '6d02a42ee09c5b044efafec9dcfcddbd63375c18',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Concerns\\InteractsWithSignals.php' => '47f0206780b3b10c24ef4f6d6c9f3d1b313df603',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Concerns\\PromptsForMissingInput.php' => '3adc9cd6a7be394f199d939255c975f3bed6b8b9',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\ConfirmableTrait.php' => 'deae68b690dbbee3a48865f3ee9c21de756f08d3',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\ContainerCommandLoader.php' => '1c4abd30f4fafdaf1b56d08a0303e549eef23ce4',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Contracts\\NewLineAware.php' => 'c4d2cd2b59b9ad83cd246b6950bfac6389fef280',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Events\\ArtisanStarting.php' => 'b386fdc29f713bf7cb2507e1351f7677a193a0b3',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Events\\CommandFinished.php' => 'e7b3a01f1778f8efe6de5364a90f46f200e04efb',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Events\\CommandStarting.php' => '6a4b674f159aa57b8f3108c1dd0f9c1a45f9a5dc',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Events\\ScheduledBackgroundTaskFinished.php' => 'b830bdc0610af0e9e91ea7d880d3ceab297ed2ff',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Events\\ScheduledTaskFailed.php' => 'aa2279ee8188a4c39b245f416cfebd4ad5f8a17f',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Events\\ScheduledTaskFinished.php' => '0126d382bc17614b5a259ce87e8a0061c7367f74',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Events\\ScheduledTaskSkipped.php' => '9e344b74cc39d262071b01b6608bdb613fbc3383',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Events\\ScheduledTaskStarting.php' => '7ccd55ce2b40cf5f66ab2602235a0f4f64b4db6e',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\GeneratorCommand.php' => 'dd4e42bba9c6b11e6b0878ebb22adabbfe221e71',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\ManuallyFailedException.php' => '46839a0f217b893f8ff25ed4cb1399ff1d2d7656',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\MigrationGeneratorCommand.php' => '572e5afa6a7ef3dfe720be92be8f5c170c725789',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\OutputStyle.php' => '1838cf1a1399d476b6565c90ec3502300989a4c4',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Parser.php' => '77f463bb12f9206547753b10feac5a0b47714bc0',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Prohibitable.php' => '5fb475560de92f67d84d80d12fe47000e16861d6',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\PromptValidationException.php' => 'afec9bbd39d780ee82fb9923a67fb49b44fd1514',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\QuestionHelper.php' => 'bd7158e506118919d5aa03feb044c2d20e204745',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Scheduling\\CacheAware.php' => '0c9e2117cd5b70699deffec28a55bb9faf56b908',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Scheduling\\CacheEventMutex.php' => 'ecc0f3363d4dff53af30f72583fd7b7ffce279ba',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Scheduling\\CacheSchedulingMutex.php' => '90e871d4f9c3331e2cae67e26f8a574fe9761e6b',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Scheduling\\CallbackEvent.php' => '5b1b45ef67911ee13cfb89b27ffeffaea38db28a',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Scheduling\\CommandBuilder.php' => '88ff1fffa44eb74a3f43f5a4ca6d7b8ea508a860',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Scheduling\\Event.php' => '8e0f18ebdc454d6c4ea763fc8aab7d8f2ff790c4',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Scheduling\\EventMutex.php' => '4f2043cbdfaf85af3b0b45ef4b572c81900a9119',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Scheduling\\ManagesAttributes.php' => '3a01249e2427a2d61b703425366deacf6c7aeaad',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Scheduling\\ManagesFrequencies.php' => '4b50f28ab5edba0f5024ad4097151ecfb4d65d3a',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Scheduling\\PendingEventAttributes.php' => '027b156a8a344fcf3b247af1b1b749e5932ee871',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Scheduling\\Schedule.php' => '44d9b84e58d58d0f48b866ab2c215ce45da9036c',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Scheduling\\ScheduleClearCacheCommand.php' => '21c3c364597fa1b3f3a1602a541f5027edeb2207',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Scheduling\\ScheduleFinishCommand.php' => 'a6de2636c51c997f76fc87d0806016a2f9bc1a99',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Scheduling\\ScheduleInterruptCommand.php' => 'ce852b8f2140d2a21f35af1d03a19f1cc0951a9b',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Scheduling\\ScheduleListCommand.php' => '5855ff119d2d28adca1134040cdd6f0bc733d7a4',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Scheduling\\ScheduleRunCommand.php' => '8c9fe7820c7ef6e93e0f4434ab24bcbb16ded1b0',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Scheduling\\ScheduleTestCommand.php' => '3af9e4e8697e7912f9b860fa978caeaf779e9861',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Scheduling\\ScheduleWorkCommand.php' => 'fd6679c81a14212936881c001a4a82af89338c5b',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Scheduling\\SchedulingMutex.php' => '8c71be48335b1146e14e2b72b47ae5a712f391e6',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Signals.php' => 'aac2022fae065bcf4de3f57435cb937f923ded41',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\View\\Components\\Alert.php' => 'a54b61b7749d369f858b95ec2b69965289728dd7',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\View\\Components\\Ask.php' => 'ff1618efb4dc904208b38d4999cbc03f50976024',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\View\\Components\\AskWithCompletion.php' => '0daa73971b8bcee481d937c17c93a6883824524f',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\View\\Components\\BulletList.php' => '020804be600d36c41bb5ebde3fc1f7a356e9e00e',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\View\\Components\\Choice.php' => 'b4e56f71a291fbd445e0a7f6bb4440e08bb07180',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\View\\Components\\Component.php' => '83eeb16876760d87e4612cb06dd679cdb5d1fa5d',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\View\\Components\\Confirm.php' => '1a4b88b036693cb358cf9ef321c170228203e104',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\View\\Components\\Error.php' => 'd06bec33f47fd7864590844c49480cbc9a3c7510',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\View\\Components\\Factory.php' => '03b738098279fd5b6ca82d73a0103022e3fd3632',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\View\\Components\\Info.php' => 'bd0ae671647a29bb1ad092574afbea3bb66596aa',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\View\\Components\\Line.php' => '1472fca80c29d1974c02b640680b4ac96a5d4575',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\View\\Components\\Mutators\\EnsureDynamicContentIsHighlighted.php' => '142226d43c2b4c8674b36568184a9677f55c6688',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\View\\Components\\Mutators\\EnsureNoPunctuation.php' => '18bd0863ab44630481c2a35f801640a56a3252ec',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\View\\Components\\Mutators\\EnsurePunctuation.php' => 'f056f1d20fd6068029866e3725294cd6f91dca64',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\View\\Components\\Mutators\\EnsureRelativePaths.php' => '3831832f8845181d487af908ce5056ea0432546e',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\View\\Components\\Secret.php' => 'ff259045a53d3aa80ed10d7d63fdd93b04d791e8',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\View\\Components\\Success.php' => 'ce2e62ebd4eed877c8888df14859d8aa5c536dca',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\View\\Components\\Task.php' => '4947fbc4867460fdd8354f1f3a5211b4d8a692e6',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\View\\Components\\TwoColumnDetail.php' => 'aa3d9ff6fd7663041aecc657b62e59522bcdddf3',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\View\\Components\\Warn.php' => '46a3f56a055177b2192baad835aef43f30693615',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\View\\TaskResult.php' => '2234060aad2e5ab16302525e9acaa98e8684204d',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\resources\\views\\components\\alert.php' => '4348dd8ca80275657f93e72887b111a91f520960',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\resources\\views\\components\\bullet-list.php' => '4c1f945ef97ee5c7402b9369e49e9e4f181af8ee',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\resources\\views\\components\\line.php' => '5e89ba86a7a1adced6ec94a17347d09885a157b2',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\resources\\views\\components\\two-column-detail.php' => '6d10f1eb5410ac604a9e0f66be8a151932c9304f',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Attributes\\Auth.php' => '4330790ef2c389721f7050e26ba130be03765af6',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Attributes\\Authenticated.php' => '3a51a66978c847ef0fb298cd11d2bb35248b5ad1',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Attributes\\Bind.php' => 'cb65f5aac7f0c0535e7331d9f16d35e9dc79f31f',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Attributes\\Cache.php' => 'c5d504df073e9096dcf283286356a01b5f89881c',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Attributes\\Config.php' => '7a528842acb9248cb6525afa3f90368e4f651183',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Attributes\\Context.php' => '29e5f2bf35bcedf55d01123681682093e121bf3c',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Attributes\\CurrentUser.php' => 'f798f4b36ad93f02adbe7cb1d31b0af25c32226b',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Attributes\\DB.php' => 'aeb0ec3689350eafd33555b131a30a2b94e0c197',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Attributes\\Database.php' => '559ccd546186d97bf0ee01ed711a3eebff0f5c88',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Attributes\\Give.php' => 'ea3c0f40956db1b5dc3c5c4be15b10c465d26daa',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Attributes\\Log.php' => '8bd135e27eb8647dd86b196e0601afa756dbff4d',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Attributes\\RouteParameter.php' => '250d4f86b6ce9543d534e88030ea66a22b7d01ac',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Attributes\\Scoped.php' => 'ebfe2da73eec4ace4ac5a270b62f4c466432330a',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Attributes\\Singleton.php' => 'b0c20d20e629d8107e959d13e1c37074a55309ad',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Attributes\\Storage.php' => '6ed98d16643876a34d5fbfbbe0cdf346b63e99eb',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Attributes\\Tag.php' => '3e963bc3140de0f03dd00f95947bb6a453d4c590',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php' => '110d73f489260859fef6d42ecb6d0de7fd11abbc',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php' => 'a36290defd4eaa662a041ad809f3dfdafa78467c',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\ContextualBindingBuilder.php' => '8d4da7ac0dfbd4ec268875f63056c6061a10318a',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\EntryNotFoundException.php' => 'ce4cafce52a220467084dc0ed071522d63247383',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\RewindableGenerator.php' => 'a94e7d5710c1b83a4d2e43a7defd7638d7306fcc',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php' => 'b535189de7be286b601cc581843621a0277b2c39',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Contracts\\Auth\\Access\\Authorizable.php' => '9f9a7f6cac733666f86bb61d1dadf32ba26aace9',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Contracts\\Auth\\Access\\Gate.php' => '46d2602dc0b3cd9fec43bdc0bdc5a9e3b9a94db0',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Contracts\\Auth\\Authenticatable.php' => '9031869d8a2188f7f15b684e02a8f433be372858',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Contracts\\Auth\\CanResetPassword.php' => 'ef2e2b796262e673b4e179ceb9aca24ef364e838',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Contracts\\Auth\\Factory.php' => '2b0aa0a9300857c19122f91cf132dcad7ac26298',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Contracts\\Auth\\Guard.php' => '04a76e286407a3a80afb209e80fcb778f0371151',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Contracts\\Auth\\Middleware\\AuthenticatesRequests.php' => '20d63ecbbb7f644d1b04f59e6432724d65da13dc',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Contracts\\Auth\\MustVerifyEmail.php' => '3434bb8f2dd4fa19378b6ca4eda22f3851185bd2',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Contracts\\Auth\\PasswordBroker.php' => 'e7d84a035348b352b0035b9d29cd46c8849fc931',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Contracts\\Auth\\PasswordBrokerFactory.php' => '5e4682aa725f5077fb9b3953a23006ee28ae7b76',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Contracts\\Auth\\StatefulGuard.php' => '67e310225f60a781ce1fc5c24c3bf52aa5de9634',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Contracts\\Auth\\SupportsBasicAuth.php' => '3d6e62ea5e35216718bee8847e7f338886df4a7b',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Contracts\\Auth\\UserProvider.php' => '1746500bd7a538b685d0c965ae7dda1dc87ff5aa',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Contracts\\Broadcasting\\Broadcaster.php' => '4732d92cbb9859631fad5c73d31136c4543a0419',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Contracts\\Broadcasting\\Factory.php' => 'f40ebf7057d4c5a05958416702506e1219d9a72e',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Contracts\\Broadcasting\\HasBroadcastChannel.php' => '049585a6b84e954b19a74f1382c3269cfb96b25b',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Contracts\\Broadcasting\\ShouldBeUnique.php' => 'baaa1dce2d3020778e6047d879c6f7b3594d8de6',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Contracts\\Broadcasting\\ShouldBroadcast.php' => 'a58f2718b6211ae8aaf115a1269ad53b9035999a',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Contracts\\Broadcasting\\ShouldBroadcastNow.php' => '820116f3d5b3586de6f66add7794187db74a1565',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Contracts\\Broadcasting\\ShouldRescue.php' => '30086558c2591f557c4a21dd181bf1c267b18cf9',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Contracts\\Bus\\Dispatcher.php' => '6c2327e2b19aab548595728b0695b52b6845541e',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Contracts\\Bus\\QueueingDispatcher.php' => '24768db2318c7fbcaa9014399c58e2cea3bc184f',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Contracts\\Cache\\Factory.php' => '16f25d84b9afc1de97bab750418b4ac4ea0ac21c',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Contracts\\Cache\\Lock.php' => '56ffed0b3f3dcf1c35294fa0b6f43603eccffc71',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Contracts\\Cache\\LockProvider.php' => '196888b128f29f22a3936b500b90435304749e6f',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Contracts\\Cache\\LockTimeoutException.php' => '4ffef1c09a6998fd51210d8c6d27f44341380778',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Contracts\\Cache\\Repository.php' => 'eecfcb0884552c9221cc2963859266e55dfe5ab5',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Contracts\\Cache\\Store.php' => '31bbdf2e1f9cbc9d19b9357fb971f7f7d4560236',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Contracts\\Concurrency\\Driver.php' => 'ca7cec43b91b7f92a33db3bbbfa1a555d6eb5a25',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Contracts\\Config\\Repository.php' => '2d501be5bec22295682fb4d3757dd4ae8fa1003a',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Contracts\\Console\\Application.php' => '5de21dabd76c97f90df51494cb6f4e4538e4d868',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Contracts\\Console\\Isolatable.php' => '642a42d1fd0b48054793dae9e4b9004275b775d3',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Contracts\\Console\\Kernel.php' => '8e69a4ba120a7be94da51091472cb4605155392d',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Contracts\\Console\\PromptsForMissingInput.php' => 'b976374bdb3cbe6ff7d9d0faf2a86e8b119a9f45',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Contracts\\Container\\BindingResolutionException.php' => '0daa4890e54331030309393257206eb009daa5cc',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Contracts\\Container\\CircularDependencyException.php' => 'd51506f27d2453474eb6708c8a47fe92d0e7fe12',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Contracts\\Container\\Container.php' => '2e636290fe73af41fa4dbfbce402ba34780ce182',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Contracts\\Container\\ContextualAttribute.php' => 'bcea692e5bee8eb2a16480ed3796b1f2fa931732',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Contracts\\Container\\ContextualBindingBuilder.php' => 'f620e759ac913c7f4bd7bd4f9f3d9c8c26b0ac39',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Contracts\\Container\\SelfBuilding.php' => '4053f5d0e3cded05dd0a11f8bea7380905ee80a8',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Contracts\\Cookie\\Factory.php' => '06169f027a89b9c2f023b22577b521258258ed61',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Contracts\\Cookie\\QueueingFactory.php' => 'd5e1432c36c3e9f4584a31cfb99eff01860baa82',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Contracts\\Database\\ConcurrencyErrorDetector.php' => '57cf94a4ca44afc02d97e75521a532ae16773de3',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Contracts\\Database\\Eloquent\\Builder.php' => 'b5be46860f05bb513403436f0121086cd99096ba',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Contracts\\Database\\Eloquent\\Castable.php' => '712195f9d9362ea661f7839d93651ae84d86f35d',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Contracts\\Database\\Eloquent\\CastsAttributes.php' => '687742cad04baa0b09f56675596ec4dd85481aa5',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Contracts\\Database\\Eloquent\\CastsInboundAttributes.php' => '65e1ee5680eade7cb1c8c1073c13b5845034e681',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Contracts\\Database\\Eloquent\\ComparesCastableAttributes.php' => '835d5d69ee2f76294e3b102b15607ed6eb6f59b0',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Contracts\\Database\\Eloquent\\DeviatesCastableAttributes.php' => 'af40bd095759bb4e1736de5c3b7072acc497f8eb',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Contracts\\Database\\Eloquent\\SerializesCastableAttributes.php' => '85570a658bc6b1b47f79376717c3963c5150498e',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Contracts\\Database\\Eloquent\\SupportsPartialRelations.php' => 'a552279567e52808ae2944d4b81a55d550421aa1',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Contracts\\Database\\Events\\MigrationEvent.php' => 'ccb9774b62b8a4d67038ac4c8bc244ba037265b5',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Contracts\\Database\\LostConnectionDetector.php' => '7d230c071c40bc7ed23c1047a4b57b8c7144346d',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Contracts\\Database\\ModelIdentifier.php' => 'f2976a51608242910362cc11e48319d8f39601d0',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Contracts\\Database\\Query\\Builder.php' => '7643b3bb0d828b60ab522640e77d2a2bb5404317',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Contracts\\Database\\Query\\ConditionExpression.php' => 'bdca7f63e448b9cad94e8e5e8788f1593beb89e6',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Contracts\\Database\\Query\\Expression.php' => '662dbca24cea9079980ad581d7e6147779d43e04',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Contracts\\Debug\\ExceptionHandler.php' => '75e036f194fee91a3d76c0832ba9a8649c6de779',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Contracts\\Debug\\ShouldntReport.php' => 'acc10684ac21d3b1e1e1ed1f58f70fe851bad312',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Contracts\\Encryption\\DecryptException.php' => '857717a5f35ed2bd66639325717c601ccefdf36f',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Contracts\\Encryption\\EncryptException.php' => 'e27ef837b4e5ffe7dcdff6d3c3ebcb71cb0e7f55',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Contracts\\Encryption\\Encrypter.php' => 'e7bbea9004e99cfdd564086ccaa5056c28cdd245',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Contracts\\Encryption\\StringEncrypter.php' => '13167fa9be2703d15c51ce645ebb0d33eb94d155',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Contracts\\Events\\Dispatcher.php' => '63a7080811cc1da04a561c31e95ade849557933f',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Contracts\\Events\\ShouldDispatchAfterCommit.php' => 'cb64bced8af91e49c248b9ea8fb4de45b05187f2',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Contracts\\Events\\ShouldHandleEventsAfterCommit.php' => 'a234f85b6edaccf530b026284c617d087e3a3da8',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Contracts\\Filesystem\\Cloud.php' => '0e2a49788dc1e3890557904657cddeb0dc6cf436',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Contracts\\Filesystem\\Factory.php' => '27940198b0fd93864afe0229948ac2dbf5971ed4',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Contracts\\Filesystem\\FileNotFoundException.php' => 'e0f5b32f96c7ce0ec17ba137dcb7095baa9203f6',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Contracts\\Filesystem\\Filesystem.php' => 'c27ca9b6f8e3cca471793822ccf469f16649296f',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Contracts\\Filesystem\\LockTimeoutException.php' => '76677a26429c40e76843567264ee1b48c5e4e40d',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Contracts\\Foundation\\Application.php' => '45eaf2309f086a248f6f0496b17aaa512175cec9',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Contracts\\Foundation\\CachesConfiguration.php' => '75a18ee7b931f8fef5989b838bda05b990d23b8e',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Contracts\\Foundation\\CachesRoutes.php' => 'bde68f284031333148ac7f234badc62675e3c3d0',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Contracts\\Foundation\\ExceptionRenderer.php' => '3d21529170b9022326656ceb2f013fe70836d839',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Contracts\\Foundation\\MaintenanceMode.php' => '9aa4d792987a150e68f53dfa9b8eb1c1687695e5',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Contracts\\Hashing\\Hasher.php' => '28a89116367c3961899de67fea3b007a4f03192f',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Contracts\\Http\\Kernel.php' => '2be26f4d603ed87f15566cb0590968e86aeff94e',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Contracts\\Log\\ContextLogProcessor.php' => '646cf80925b7849f1cd11aaa64ab1a38d0e3321e',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Contracts\\Mail\\Attachable.php' => 'c99defcdca8d9364e7034df8a5958c548995dc14',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Contracts\\Mail\\Factory.php' => '5eaf3c4b57dc321a5a12c0bae2fe6a53d1ecec95',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Contracts\\Mail\\MailQueue.php' => '627311bee4517ac75c612698ac801d825690c9be',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Contracts\\Mail\\Mailable.php' => '055d29e64ffec4ad4efcbdc6d9398f809b1a330b',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Contracts\\Mail\\Mailer.php' => 'dbbf852e92071957f9827a25d77c65cba2270493',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Contracts\\Notifications\\Dispatcher.php' => 'e975ec6378610f1d978b7f9a06906eee9b2dc108',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Contracts\\Notifications\\Factory.php' => '2639dc6a52c530729a0e9c3671da6774d805ccb3',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Contracts\\Pagination\\CursorPaginator.php' => '00097d0760c58c8a460ee0e2abdbcb7668f522b7',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Contracts\\Pagination\\LengthAwarePaginator.php' => '1ea5199e91c8617548a47905feb5d92ad3aab8f6',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Contracts\\Pagination\\Paginator.php' => '35da8b7c7f2d95bd13a20ce39bcf9fbcc5330c78',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Contracts\\Pipeline\\Hub.php' => '7f41f4159390e5af2a609b64c535aef443a2ae0b',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Contracts\\Pipeline\\Pipeline.php' => '93565d7ae5e00abc1f32edd24014312b2a8f7b2d',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Contracts\\Process\\InvokedProcess.php' => '05213cdb47df089890b467068dd3d4ac73b8864e',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Contracts\\Process\\ProcessResult.php' => '726d1cadecd8d202c53d5f6b7a094f849b20d184',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Contracts\\Queue\\ClearableQueue.php' => 'ae590bfab31e3d9e70e7267637fc9f2c278603ed',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Contracts\\Queue\\EntityNotFoundException.php' => '4e6814027e68356844918821458b07c0c5945f28',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Contracts\\Queue\\EntityResolver.php' => '57cefb01fc42c401c38a8c19f6691ba8d0218c30',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Contracts\\Queue\\Factory.php' => 'b81137c063319ee9cdab3dbd5f3cd548f4f171c0',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Contracts\\Queue\\Job.php' => '58cb5ae5f898849b7847b32f8d48cdc63b0cd728',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Contracts\\Queue\\Monitor.php' => '78b8072235713621974159ca8f54337d7d26c42e',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Contracts\\Queue\\Queue.php' => 'aa625c01beda625f46e0d6be3a352090ab28db64',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Contracts\\Queue\\QueueableCollection.php' => '0c0c9be9c3390f350a26e215d19a7f83fff1e33d',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Contracts\\Queue\\QueueableEntity.php' => '75d26d03f46783af3cd4bef431866ee6fd6c9143',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Contracts\\Queue\\ShouldBeEncrypted.php' => '27ac73cfd801ef72f00b1845480c8a355af89167',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Contracts\\Queue\\ShouldBeUnique.php' => '323caf5baac442fb2203109353d76d2015ce37fc',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Contracts\\Queue\\ShouldBeUniqueUntilProcessing.php' => '6f07dd5e34994af27bf37e7a3960284517eddd65',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Contracts\\Queue\\ShouldQueue.php' => '75a4c36b5027d320aa13649464ca53ff5838436f',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Contracts\\Queue\\ShouldQueueAfterCommit.php' => 'e64b56a2a30cc819fd9d8c0185f31be44bf88a2c',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Contracts\\Redis\\Connection.php' => '8380e76a3a96b1eae5562f03f9df4fb2a7c6024b',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Contracts\\Redis\\Connector.php' => 'f134f2fb336d461d062e95f71ce3ef1b39b01fee',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Contracts\\Redis\\Factory.php' => '51d43244a31d294e9a100e67220f51ef784af205',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Contracts\\Redis\\LimiterTimeoutException.php' => '6a0fb4e39a8699110499e8ca2cf2d47df4688fb8',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Contracts\\Routing\\BindingRegistrar.php' => '229ce4487ec68e40e632afc6e5d9c6bad825b1cf',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Contracts\\Routing\\Registrar.php' => 'e8e5237b95904348baed297b5b98be4ee7b0f9d2',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Contracts\\Routing\\ResponseFactory.php' => 'eea1f2a7a9e858f6359b25dea10321673fe78987',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Contracts\\Routing\\UrlGenerator.php' => '7b452daaf78e57976a2780637613ce523f7350cf',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Contracts\\Routing\\UrlRoutable.php' => '7a60334abd14816508af59745f61842ab98d35b6',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Contracts\\Session\\Middleware\\AuthenticatesSessions.php' => '3330327d6d077d00c89c763b1b2035a13385533e',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Contracts\\Session\\Session.php' => '2762d4bcad3df5509756e3359d996a3f9fa5d22c',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Contracts\\Support\\Arrayable.php' => '4823034f955bdcc138f27e13842d6eee6d6718fe',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Contracts\\Support\\CanBeEscapedWhenCastToString.php' => '2a2a4ccd18049854dcbd952e2588838ddebec096',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Contracts\\Support\\DeferrableProvider.php' => '738ed728f346394f1982568dfcfad959ff0292bf',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Contracts\\Support\\DeferringDisplayableValue.php' => 'f33c16113a58cddad4cf80cb58acb59418afdace',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Contracts\\Support\\HasOnceHash.php' => 'a5c2b0cb048d6a54662277eef1aca4c547361e91',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Contracts\\Support\\Htmlable.php' => '8b5efc32cef2c93205cb44bc35ab83b2f43041c9',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Contracts\\Support\\Jsonable.php' => '890fb5e371ac754a9fccea6dd640cd53524ea01c',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Contracts\\Support\\MessageBag.php' => '2f3e8ee373cd8a0138d1800d1eacd841a9949060',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Contracts\\Support\\MessageProvider.php' => '486b4b919e26612c1026d5a9bfa38fed5979b589',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Contracts\\Support\\Renderable.php' => '087a6c6a04d34fa5c7d3ab8d5052e735f3c87a02',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Contracts\\Support\\Responsable.php' => '8cd2af6db737fab49a737f1baf2ecf7615ccb5a4',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Contracts\\Support\\ValidatedData.php' => 'd8f459c4c3c48784a93445b8ddbd3d096d18cb94',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Contracts\\Translation\\HasLocalePreference.php' => 'e2c10cc80bf3b002d4cfac1a184a13e463f455d0',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Contracts\\Translation\\Loader.php' => '6b409a5588aabe20cc5aad2821338438221bfe92',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Contracts\\Translation\\Translator.php' => 'a42315698d4280583ebf7b9f187fedeb0cd01757',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Contracts\\Validation\\CompilableRules.php' => '04eeb61ecb8b643046d06645dd1499c93477755e',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Contracts\\Validation\\DataAwareRule.php' => '1fea93b20f2ff6ac2865661c536bc487485bd778',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Contracts\\Validation\\Factory.php' => 'bb3d27dfa8d8608b8a547fc616c66ebe757edeb0',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Contracts\\Validation\\ImplicitRule.php' => '6020a68dcbf87b833b02edb3b9962f82f328ec2d',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Contracts\\Validation\\InvokableRule.php' => '4c5850f9d3c0419cd9d83d110c174b300147053a',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Contracts\\Validation\\Rule.php' => 'd4b4953bf7d0cb9bcef56925478f66dafff3e9fe',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Contracts\\Validation\\UncompromisedVerifier.php' => 'e5f4cf1ac5b95484a723d246a2746023b40dac66',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Contracts\\Validation\\ValidatesWhenResolved.php' => '11feb1cdbcd41c4ea28a78d90a12784d986d1d8a',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Contracts\\Validation\\ValidationRule.php' => '571ba4e83686f5432bdba76cad751e791840a7f3',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Contracts\\Validation\\Validator.php' => '1009844e19875a4ef1a1d0d4c8cf87284b8bf0ea',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Contracts\\Validation\\ValidatorAwareRule.php' => '2322a1a1054fc1e8c77f3cd5470913b3329e874a',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Contracts\\View\\Engine.php' => 'dedb0a34d1c38efe10c6d8e1205a089fad4d8920',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Contracts\\View\\Factory.php' => 'fac8859259a17fccd1c90a9c443b427bd2b88c72',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Contracts\\View\\View.php' => '752637cb64da0795cad8d6a726dca9e04c1509eb',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Contracts\\View\\ViewCompilationException.php' => '435cf54f461211f6bdcecce92cbbdd0c503cb926',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Cookie\\CookieJar.php' => '3984787b45a47004ec2da0b35b194fea4a0af139',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Cookie\\CookieServiceProvider.php' => '7217b991943c717ac9b1f3a70bb37e9d141921fd',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Cookie\\CookieValuePrefix.php' => '457b34a0a4fdb7fa7710a062e64a8701d3ef4776',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse.php' => '575c95bb9a05108db931dc83efb5006f5f3ad3b1',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Cookie\\Middleware\\EncryptCookies.php' => '1b43c80cda1f9e34d2499cc52fbcbdd67e756c4a',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Capsule\\Manager.php' => '96092afc9758c0072de8c06d78402798d6358501',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\ClassMorphViolationException.php' => '61436a27c0596ed31bc1c91e416079aab1cda05c',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Concerns\\BuildsQueries.php' => '1fa35026b635108a1e66cc98b7b287b5c8c9dd21',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Concerns\\BuildsWhereDateClauses.php' => 'd1a439b2bd79ad26ecda9af12713157fafd2b2f5',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Concerns\\CompilesJsonPaths.php' => '0b46622887454deeca91049cd496df08ffc32114',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Concerns\\ExplainsQueries.php' => 'da448a327b7c0fd28be52ea5c6a6abdef62f8b5c',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Concerns\\ManagesTransactions.php' => '16e410a6b156826a5f11ebc85e50249f6037681b',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Concerns\\ParsesSearchPath.php' => 'e20b2d0b1dcea1dd35eaae8101aa7c2f65a90cfa',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\ConcurrencyErrorDetector.php' => '7ee246cd793662561e1ee8b80cf0923194dcd556',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\ConfigurationUrlParser.php' => '7f0320738416a4d17908ee4232d140ccadefbff3',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Connection.php' => 'c0aa9ca458c9913ef28b3e43194fde3ec1223200',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\ConnectionInterface.php' => 'e0460f3d85b25230846d0de31f50e2faadc30f5a',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\ConnectionResolver.php' => '255a52bf20f92a5b479608d93ef88a7d48844ade',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\ConnectionResolverInterface.php' => '8bed3f4f8f5a38b05a3c19336e55688d948d1fe5',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Connectors\\ConnectionFactory.php' => 'aa6fbb938b166f500c5282fc5fa73f64556657fd',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Connectors\\Connector.php' => 'fde615e14c1cf85f564f9b0a79f20af9e9558ca3',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Connectors\\ConnectorInterface.php' => 'fb2ae016f2ac4120c7499eecc559edbdacace412',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Connectors\\MariaDbConnector.php' => '8f797789e58661491ee0374c58cd4dddae9e2618',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Connectors\\MySqlConnector.php' => 'c283f525e5df4d6518cfc441ca3b115947dbeb84',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Connectors\\PostgresConnector.php' => '5d27a775433004198079737173f3fa32260a43ed',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Connectors\\SQLiteConnector.php' => '50295b6d114f485a890229293bb89af547fb7b48',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Connectors\\SqlServerConnector.php' => '2c0e4ea6580082b940bdb56c387c0b935b20715b',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Console\\DatabaseInspectionCommand.php' => 'b9514cbcd65d8e4abd5bb050a9645533a7367ae4',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Console\\DbCommand.php' => '44b1f15c3a7f3ff2a07753c74e5a42eb5d6379fa',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Console\\DumpCommand.php' => '960568baf66066e8e0b5b30096bb4cddf4b4dcbf',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Console\\Factories\\FactoryMakeCommand.php' => 'ded5ba92e202f3219dc39a32d0b7784f58220507',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Console\\Migrations\\BaseCommand.php' => 'fa8169d8e6f50df8ee2bb14057ae7013fd303e80',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Console\\Migrations\\FreshCommand.php' => '86a69984165f7a263098605d1e0a71f240675c00',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Console\\Migrations\\InstallCommand.php' => 'ea50ea98a7f5ab9cee95cffaa2069b9df1bafd92',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Console\\Migrations\\MigrateCommand.php' => 'd831f9acec5fb2cb51cb7c4ce723cbc40a78a4b0',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Console\\Migrations\\MigrateMakeCommand.php' => '8268ad472c7c44e6d0847f354a3b29677262d1f1',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Console\\Migrations\\RefreshCommand.php' => '45293b7406ad29a4e3ee8bbef5593491b3829e49',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Console\\Migrations\\ResetCommand.php' => '922f201b640d42a99226c102866136aa87f6d37c',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Console\\Migrations\\RollbackCommand.php' => 'c888fb11e7ccb0336fb3ba179670e60b873875ea',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Console\\Migrations\\StatusCommand.php' => 'f4233432b3ce43317fcb87e8f7d7997cfd909226',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Console\\Migrations\\TableGuesser.php' => 'f33cebce180e06f1280e8a189872b4a9d140b9ba',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Console\\MonitorCommand.php' => 'dbf79244fcba67d0d146409aeb1f9b2b7ea41d46',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Console\\PruneCommand.php' => '7db3be580dcf446edc8815a444e193e207743a08',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Console\\Seeds\\SeedCommand.php' => '4b1bc0c431e03ea17a9712bff649e0c60518fd6c',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Console\\Seeds\\SeederMakeCommand.php' => 'bbfb4e5ccbe941c54ad69b366fb3eba42baf1299',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Console\\Seeds\\WithoutModelEvents.php' => '253447355d358a3afbf68034c01d1a287c6f5b99',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Console\\ShowCommand.php' => '5f777a74a5edf5dd67865d2cf90a4a3563e8030f',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Console\\ShowModelCommand.php' => '1852b6a72f5cb0efc7d41e93bf85ecc5636e9d7e',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Console\\TableCommand.php' => 'cf6f2f1eb955caff86dd8443b46ac78b7f23e9a7',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Console\\WipeCommand.php' => '712b545fd02615525d80b066b8a04ec9e635a2af',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\DatabaseManager.php' => '6cc9b2fee036e630b7ba5811a003ffee4a756bbe',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\DatabaseServiceProvider.php' => '815f24e167d30acb8e05078ddb674bc5e62919aa',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\DatabaseTransactionRecord.php' => 'a1bd00c34849d92db744fd81fb5f7022d8d14821',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\DatabaseTransactionsManager.php' => '587df816ef7ad8dbc28bbd57af9de18536051ded',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\DeadlockException.php' => '32fce1ce370b3c0fdb0b7b056a84980549a4c162',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\DetectsConcurrencyErrors.php' => '8d3b6e7162afce9abfffc393ac40d203b19d330b',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\DetectsLostConnections.php' => 'd2aa080298f8dcf9521c10615797a4937f7201fc',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Attributes\\Boot.php' => '2ab0e666a9d5de902f91d2dcd6e73fdba47e3aa0',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Attributes\\CollectedBy.php' => 'd0bb8f85d33ca4dc587de6cbaee6a1a8a8c6bb0c',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Attributes\\Initialize.php' => 'dd7586bad6de8e9a367f177cf29eb86b29efe980',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Attributes\\ObservedBy.php' => '2eb77ce2d4f56d180d0f86cd2b3849c3c84cbafd',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Attributes\\Scope.php' => 'bf0b16daa1da367ae19f748e2729737c3e76917d',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Attributes\\ScopedBy.php' => '7eb826b3e41cfb2d253efc2ac9675f10886d3d07',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Attributes\\UseEloquentBuilder.php' => 'c50c31548cfb098039290b09d94b4f73ef2b58d2',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Attributes\\UseFactory.php' => '1b5b35bc4c2a7cf9a7284247778629b06d6dee5c',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Attributes\\UsePolicy.php' => '0eaa4bfdb91406e878e8d6c0d5878a654644f9a8',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Attributes\\UseResource.php' => '7ea4f679dab9e7d4bf13964ee9ac8fb8d06339fe',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Attributes\\UseResourceCollection.php' => 'f2be0f255b7b72fcefdaafa209aecf973462c353',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\BroadcastableModelEventOccurred.php' => '934f5e1f22d855e3a5304b1994cd923e1f9e29d2',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\BroadcastsEvents.php' => '2c937a331fe02c7842726b011434cd5049806279',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\BroadcastsEventsAfterCommit.php' => 'd40d791f4b2c7c877e6021f6d74f0eaebc9a87d3',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Builder.php' => 'fca2d451849ec57a4e35995ae4e5e8f1f358b1a8',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Casts\\ArrayObject.php' => 'd88a6b1b85003ed21056684a7d1e3efea1d8ec8a',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Casts\\AsArrayObject.php' => '07b655381d4ef5215094f020dcffbc9dd5b66ed8',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Casts\\AsCollection.php' => 'e85df801559273ec2e31de954711615a1004ffac',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Casts\\AsEncryptedArrayObject.php' => 'ed63fb73dd503ad54fb53170dcc594050c5ad2ff',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Casts\\AsEncryptedCollection.php' => '7736207192750f08a36ac2abf5ab218168d71a71',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Casts\\AsEnumArrayObject.php' => '64701231eb89f3b41d1388a855ed87a1e8ee11a1',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Casts\\AsEnumCollection.php' => '2e9b2f24f93dcca17f144df8c1ade6a7955a7b87',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Casts\\AsFluent.php' => '4bff1edeb61f42e8f3a031094631a352d4f7387f',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Casts\\AsHtmlString.php' => '6f7b1e3791d074fe21b1bc50369146607bab9d68',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Casts\\AsStringable.php' => 'be71d011ad4d1affea56f41eb5be7c8ef95b6f64',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Casts\\AsUri.php' => 'c434cbc457e31820893cd585dfa752f11264023d',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Casts\\Attribute.php' => '055c855a783dda5932f9e71e2201314a90bbc1a8',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Casts\\Json.php' => 'bab83f421613964f089f4bafb7ea05e4cbf676a6',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Collection.php' => '9da4646e18dd3bc44ffdad6dcf73bb37fbad85f3',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Concerns\\GuardsAttributes.php' => '9a2db6a58adb22ef4b2bf6b0f16c1724749f3cc7',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Concerns\\HasAttributes.php' => 'da080b3def4294f200fb97f4d130dfa418fbdd04',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Concerns\\HasEvents.php' => 'e66d727ce2ae84304e0b76d1f71c58a61cd61e08',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Concerns\\HasGlobalScopes.php' => '4616a7e7c35b0cd7da8cd6a656f3422209f2e3ff',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Concerns\\HasRelationships.php' => 'e83ffff8c2f577cc9a9a241a7cf4e0080d9b7f6e',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Concerns\\HasTimestamps.php' => '9d28970bf1f0447b8b3811dc27016dd0ba1b4b5a',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Concerns\\HasUlids.php' => 'cf7e74fffaae26d37b189f9f14e1c8996bcee079',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Concerns\\HasUniqueIds.php' => '6fe4806f0680e5db103ebbec90ca6d63be6a3785',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Concerns\\HasUniqueStringIds.php' => '40e0c26ccb3ac1d784fe9254f25d7b733da7f411',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Concerns\\HasUuids.php' => 'c5013d0b5d15a5399e7275a953714b700528c5c1',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Concerns\\HasVersion4Uuids.php' => '5a9e75dcf949c81b822d0c5dfc796c2709782cdd',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Concerns\\HidesAttributes.php' => '24a640cb3338ebd4fbf04415a21e7d097aef02e1',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Concerns\\PreventsCircularRecursion.php' => '04704f7a63ce0f86053f06ee250b323fc9e75d2f',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Concerns\\QueriesRelationships.php' => 'd614cefcc8c280fd9943383f9213a1b83ffa3cc5',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Concerns\\TransformsToResource.php' => '69074b6e9e6f9209251984144527f06dc3bc9ad4',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Factories\\BelongsToManyRelationship.php' => 'dbebb15a1e5a70c5c7cd6cef3f86eeac4b0afc6c',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Factories\\BelongsToRelationship.php' => '6a3d1b8f19c7ff697223f5145d8bd459de59dd57',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Factories\\CrossJoinSequence.php' => 'e8f3aac2743952eff87472c72ab54a430e150573',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Factories\\Factory.php' => '73cff9cbebd956e79689e8954f8ebb5f48568a76',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Factories\\HasFactory.php' => 'ff1b9373a364e8f9e6befbeace3781e6849963e7',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Factories\\Relationship.php' => 'b39a3eabb7a64c7628adfce363bc3c29c3405f25',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Factories\\Sequence.php' => 'b7338dabbb9fb65d906846310a572f73bb942f26',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\HasBuilder.php' => 'f5b267fb28cd4a5e8ec450515b64d2806fb5cde1',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\HasCollection.php' => 'cff969a60554400299371ea1aef0ad38943a8655',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\HigherOrderBuilderProxy.php' => '03d486c9ac6146c18cda9695e84850cf3eb20f3c',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\InvalidCastException.php' => '69a643816fe0fd8ba7a82840fe9a50f63d7927cf',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\JsonEncodingException.php' => '574f6d74b243c4b822c88254705d45909014400b',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\MassAssignmentException.php' => 'b0793d3690b126ed1abb796c61bdb87bea7609bd',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\MassPrunable.php' => '2f020eaf5e33efb68c6f8dfff7fe689c3e18e5ec',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\MissingAttributeException.php' => '7b85493c05497d39fa02ab652a5e452522baed87',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Model.php' => 'd40780bd5b572395c75bf765cb874a3739c2ea66',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\ModelInspector.php' => 'a2f219345f87763fc7a080579c29883baa0f3867',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\ModelNotFoundException.php' => 'a9c3738fc74462cbb5c6430f2e74ce301219122c',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\PendingHasThroughRelationship.php' => '0dc3d8da10709597729cff2be0fbc5eadb87dc62',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Prunable.php' => 'b6521e9a52ff5400230622b6a8e3108c42c5c567',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\QueueEntityResolver.php' => 'e35871824957788c7e948a59a67aa3cfe303b0cf',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\RelationNotFoundException.php' => 'dacb5b29e68e10d3722e5a7686f1401c5e437ce0',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Relations\\BelongsTo.php' => '29515def7f12b995d9b0a814ba72dedceba96bbe',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany.php' => '21ccec8d861d668dc57ee09a18e925e0dad3b695',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Relations\\Concerns\\AsPivot.php' => 'd539ccc33562f34f5053807219c2508830ed64de',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Relations\\Concerns\\CanBeOneOfMany.php' => 'cb5848ee119c7c73736344f0cbecf75b508746ff',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Relations\\Concerns\\ComparesRelatedModels.php' => '2ebdd80dbcff866df5c1cb2eaba31dca042917e3',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Relations\\Concerns\\InteractsWithDictionary.php' => 'e3168fd4f3ac4cc4d68c78aa9d310e0c5a7544f1',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Relations\\Concerns\\InteractsWithPivotTable.php' => 'cf83cc400c3eeed8bcbbc8dc7b557a180432f955',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Relations\\Concerns\\SupportsDefaultModels.php' => 'd29a3a601f4b2b301e30b3b245e34f7fa7727d9a',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Relations\\Concerns\\SupportsInverseRelations.php' => '0cd3c7343fa50f8ca8d2f4bdb6f2078340753026',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Relations\\HasMany.php' => '53a762e79dc15d09becc50ae0257ba01454df6ed',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Relations\\HasManyThrough.php' => '06788d3dd3dd9136c17dd2ab461606ae22a8acff',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Relations\\HasOne.php' => '1a9b72e8e9d3dd774139525bd31d0f9b9de7cb57',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Relations\\HasOneOrMany.php' => '08434467fbef0d967559bc98f85922e8972cc9fb',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Relations\\HasOneOrManyThrough.php' => 'b4e3e39e974d216518b006996f82f4dc70015df9',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Relations\\HasOneThrough.php' => '0f47861e516865d809c68e1e54a4fa6e45f9d176',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Relations\\MorphMany.php' => 'd4d23029c640d97eb0aaffba56cd70643944b139',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Relations\\MorphOne.php' => '9aee240dcfe593b5305c0fe18174c3ccdafe6305',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Relations\\MorphOneOrMany.php' => 'ef4dcf552903eea1d9a361722b475081e55286ab',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Relations\\MorphPivot.php' => 'cd3a4562a81999b3a128fa54bd24a654b5954c74',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Relations\\MorphTo.php' => '1d01a09341f63a35cf569af4ecd0947d62fcb040',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Relations\\MorphToMany.php' => '79d91e87ec660ec6ea541ca72cdda3736bd2961d',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Relations\\Pivot.php' => '7f9cbe7b60be8bb3a1578f441a60ccd0a926e6cc',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Relations\\Relation.php' => '6ddbcc15560e0d641c3c3f97cd63cc5b1e7489e3',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Scope.php' => '1b48492385cb3d209c044e7e008f43eb3ff7957a',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\SoftDeletes.php' => '040faf922006ef7c7bc948ecc7d0d08a4f996372',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\SoftDeletingScope.php' => 'ea917b638aea11ccb0d43b3e486dfe5b9c8a33c8',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Events\\ConnectionEstablished.php' => '9f4a96f79c4b9ca27cab74558f4038a24d15620e',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Events\\ConnectionEvent.php' => '465ada0892c74edf6c9046ea811ca74ef0e1103c',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Events\\DatabaseBusy.php' => '8c2b921b2934ce0e2bb3e73e77878de49c8d1666',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Events\\DatabaseRefreshed.php' => 'e96458017c8a7cfae83e917c3eff31f272b554f7',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Events\\MigrationEnded.php' => '43381e10ec15b2fe58b31d3a95e5a99bb251507a',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Events\\MigrationEvent.php' => '60e40995d0d61eead676df2748a4f06d6ca09fd3',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Events\\MigrationStarted.php' => 'b14eb081c489bef54949957a9155f4a88401e197',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Events\\MigrationsEnded.php' => '1d925e46a2875ae39d6ced845e7ab7663302c733',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Events\\MigrationsEvent.php' => '0af3ca64bdac26ea9d8dfbe40c4b434636817d83',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Events\\MigrationsPruned.php' => 'e84bb8032824c8d97b040ac32577bdcda2a55993',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Events\\MigrationsStarted.php' => '266345f6c725691541aff1801d80459eb61df7cb',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Events\\ModelPruningFinished.php' => '05074a1a712afb51e21fc77f6302373f33f8efe7',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Events\\ModelPruningStarting.php' => '252d8e1be6228a3698f368143aba66857169f963',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Events\\ModelsPruned.php' => '156e4f7acdb3c9f0515861b30ee02a7fa3454b74',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Events\\NoPendingMigrations.php' => '595b794f93cd7cdccdc9ce5c7cd0d161425bf600',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Events\\QueryExecuted.php' => '84ead833398ee0f6a4d346f9041cc7ab22a277dc',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Events\\SchemaDumped.php' => 'ec096b82e3df08ff8bff3760f8f4c2cceae2d7fd',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Events\\SchemaLoaded.php' => '785bf5ac7099d16491fecc17574c5a0202278e61',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Events\\StatementPrepared.php' => 'ce5a2391d0d2ad4dfe50c3667b26f1c2929ffb4f',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Events\\TransactionBeginning.php' => '43aa8c9e26b46c3b4a03ca917ff1ef1e6f9428a8',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Events\\TransactionCommitted.php' => '7c1d3bc6f43e139c24e9eb94452348f5156bb712',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Events\\TransactionCommitting.php' => '519074cb67a2d7366f6b0539ddbd9167da1d32be',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Events\\TransactionRolledBack.php' => '66ef95dd6b9d78ce784d74efd5cbc88cefd72360',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Grammar.php' => 'ad5eecd801893afe174b340099a0a38c89ac6048',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\LazyLoadingViolationException.php' => 'be88b0a10174e76f19b76f971f154dc87fc81610',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\LostConnectionDetector.php' => 'ddedb1674563ae248feb0e340b1936385c746b34',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\LostConnectionException.php' => 'f96f0801640dd28ae5b00b36b677325c0c58ef59',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\MariaDbConnection.php' => '40177ebae4da2b95c86f3fd22920a976a3a74764',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\MigrationServiceProvider.php' => '0775e347ee4a58fdada9cf9424e200450d66e7a8',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Migrations\\DatabaseMigrationRepository.php' => '94d7e67ac54a216dab14944cc7d21337682fa199',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Migrations\\Migration.php' => '867c84499b5d755a6498105455bc234daa9cc414',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Migrations\\MigrationCreator.php' => '07c1d0512208d2c509abbf2cc7b21c87648dd957',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Migrations\\MigrationRepositoryInterface.php' => '3dd862766f5adfefa461b78fb135efd0b7e7216e',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Migrations\\MigrationResult.php' => '13657beea51edf7f06958d9070c6985dffbe1e02',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Migrations\\Migrator.php' => 'a881ff48c8b48567d5dd77169e310f481e81c04c',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\MultipleColumnsSelectedException.php' => '0d37c5e66186061db14cd8d0ba8bb33e95cd1cf4',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\MultipleRecordsFoundException.php' => '87a901a94aa00e3a1016d93ab5b27bad6e51c67e',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\MySqlConnection.php' => '5e7bb8d9994009e01e7e2d735b72dacd5634d6ab',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\PostgresConnection.php' => '74a02dad5e0a92faae0075291ba7acaba9a75d1e',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\QueryException.php' => 'a745d9ab3aec8db6d17928f87de4103a837cc312',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Query\\Builder.php' => '8dfb000f1f579b466321b19d6bf64eb0db794c0d',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Query\\Expression.php' => '7c5737b6847785fe966ba1b456f65152e8c7d9d2',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Query\\Grammars\\Grammar.php' => '9cceb8dd368c724ea9d3cd48d1ac68a4652785e7',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Query\\Grammars\\MariaDbGrammar.php' => '44127f198581cb74256d54126db97d6fb7d2a294',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Query\\Grammars\\MySqlGrammar.php' => 'e105a5be403f1e89b046bd3aefa1a5457037febf',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Query\\Grammars\\PostgresGrammar.php' => '9b8650b7ceda58f82cfe1eb2e1d9fb3011446da3',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Query\\Grammars\\SQLiteGrammar.php' => 'c8a47e412915155b44341b1c20df86f987b54ef2',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Query\\Grammars\\SqlServerGrammar.php' => '30a9d973535f4857b430f2a4df93d2c2cfde61e6',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Query\\IndexHint.php' => '528504856103731ff14ceb0d30b41991f746e0e2',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Query\\JoinClause.php' => '9011eade9035bce2325829382605a80e4c44ddbb',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Query\\JoinLateralClause.php' => '30e94f3362fc3378871f6a4774fafb6ef9c6ec95',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Query\\Processors\\MariaDbProcessor.php' => 'b1416cdf12dd725a2f6c2333ac46561c1513215b',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Query\\Processors\\MySqlProcessor.php' => 'f7da9e2687b73b073561bead742a681a8eb7939c',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Query\\Processors\\PostgresProcessor.php' => '8367c18af6e7b2170051f4827725807f78c92ba2',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Query\\Processors\\Processor.php' => '65e6ea273bca97a22e879491b3fb55d6a34de974',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Query\\Processors\\SQLiteProcessor.php' => '7a23ed5a555d377f1fed064360fca020ebb5c9f0',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Query\\Processors\\SqlServerProcessor.php' => '23b5f2320169d33ca163d056d5d5846df9545bc3',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\RecordNotFoundException.php' => 'f1ff33f054aba5f6bfecb75dc33fe7d9aa6970ae',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\RecordsNotFoundException.php' => 'b005e656d8db29fb6dfa1b00216fe00d136cd347',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\SQLiteConnection.php' => 'f480f86087e24c9f813fb53e99092641d599e19e',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\SQLiteDatabaseDoesNotExistException.php' => '28fb437bff1145dff82494dc790abb7b9ae19c25',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Schema\\Blueprint.php' => 'df620f2a313215fb705e2851af352d253636d0ab',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Schema\\BlueprintState.php' => '8543048fdccd675719daa1d865c78b2a62ad7169',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Schema\\Builder.php' => '1ff989741d03c3dba942a8b77d814a92b03163e0',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Schema\\ColumnDefinition.php' => '2a8c6fcff90bf1331fbc6a626ebf99da12037851',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Schema\\ForeignIdColumnDefinition.php' => '0779dece2737e11bcc45bb0c080c8a8784ae6c28',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Schema\\ForeignKeyDefinition.php' => 'dbce1333e793a6bf5a0e6eda6fca8d6ac597d9b7',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Schema\\Grammars\\Grammar.php' => 'ba24c679d8f6edb7bf7e58f79600350e8a45f91b',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Schema\\Grammars\\MariaDbGrammar.php' => 'e37cd1767575adf0742ee0e5b008fcb42c2f0649',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Schema\\Grammars\\MySqlGrammar.php' => '8b8d65657ff0f6c15ff1c0e87e6957f772ac22d7',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Schema\\Grammars\\PostgresGrammar.php' => '27d6f9928d752e9fd74f21baef1a318ca2f46db5',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Schema\\Grammars\\SQLiteGrammar.php' => '34820cfbe2567d854dc5739e2eec1f5a18149124',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Schema\\Grammars\\SqlServerGrammar.php' => '9e8fd72b3e9359ca8ba3600bbca7d10762a85f6d',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Schema\\IndexDefinition.php' => 'eb77c67156e1ea60c55f5e3f56cbdadc93fb0956',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Schema\\MariaDbBuilder.php' => '5bf6d8959c21b597a4d5f4ee5746e644c41d37f2',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Schema\\MariaDbSchemaState.php' => '671badd9b2adf9bebdd9003f418d59c6e29d5be9',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Schema\\MySqlBuilder.php' => '3efd73981f1b437bf16d9f9e2ee63b24824c0c0c',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Schema\\MySqlSchemaState.php' => 'e7685227114ff02fbacc69671c6d1c69862d7638',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Schema\\PostgresBuilder.php' => 'df6bb2ff3f9db24e76e2bec405ae03084a6cf1d5',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Schema\\PostgresSchemaState.php' => '15d8068800a48b50503ea0f6e6a1d4a92ae9bda6',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Schema\\SQLiteBuilder.php' => 'b9b8f38b57f083d93743af173b937138efd50e9a',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Schema\\SchemaState.php' => '4e8921cd60b82bd21b6d2bb0876f19f90c86a5ab',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Schema\\SqlServerBuilder.php' => '290239890c21eb84bfc6d15a433bda9c519089d9',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Schema\\SqliteSchemaState.php' => '7bf78a51a734ef9526513bc6da59e8632a972239',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Seeder.php' => '7f8e004e2314d6490adfd494499defc281b248a8',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\SqlServerConnection.php' => '7424813ebcc6250a521aea28f11de46463dca6e6',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\UniqueConstraintViolationException.php' => '94552ba4d91c08b4fdd37a6f00adfed37eb8ca38',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Encryption\\Encrypter.php' => '1f7816b3106455c94605751bc26c48dec892c087',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Encryption\\EncryptionServiceProvider.php' => '5b902c95858cd6cc232db26f87918fe2c0a263bb',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Encryption\\MissingAppKeyException.php' => '0ffc1ed48d2f410246796208019c481d78e21f0c',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Events\\CallQueuedListener.php' => '31d5b86249afc39e65cf438c6b0b37cd83d57e68',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Events\\Dispatcher.php' => 'dd727b0a9e79433e2060e79bbcdc92bed0d2fd6f',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Events\\EventServiceProvider.php' => 'ce2bc761a1b930d237087f62e5ee687e35224c55',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Events\\InvokeQueuedClosure.php' => 'c68ee62054f05ca23204f53ef0e2a6f3190b1de5',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Events\\NullDispatcher.php' => '383306f15de00c5d0c73ed257dd8ea8dc604924f',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Events\\QueuedClosure.php' => '1319699f2e0e9f68e69e7a22c00ea92423ec287e',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Events\\functions.php' => '565242ae0986b1d8c79c9006cff850549bad7d77',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Filesystem\\AwsS3V3Adapter.php' => '48d60017ca60526fbe5266c0dbe3a7eb7d2e4996',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Filesystem\\Filesystem.php' => 'dc563a97d43a1b881c88933e003f66a7d8d24e75',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Filesystem\\FilesystemAdapter.php' => '83761a42727e7d3682d889ad04f96f448407ec95',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Filesystem\\FilesystemManager.php' => '19e41e70838c02fd9580e82f1ea1bb08714a168e',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Filesystem\\FilesystemServiceProvider.php' => '70de9f77e557cd36944bbbec09a70386157ca83c',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Filesystem\\LocalFilesystemAdapter.php' => '82869b758646956966aa145fc38f6216ae7e21f2',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Filesystem\\LockableFile.php' => 'ca03c1e15b1afbe13809f41a13e91e61ddf71703',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Filesystem\\ServeFile.php' => '69e7119d9e6249f1323410f2cfba7ce7cce869af',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Filesystem\\functions.php' => '4e7c696a9740f5c536d773273a076a32b58df934',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\AliasLoader.php' => '17cca41bd2e8e6aeef24aa6720b96f5656ceab63',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Application.php' => 'dfac0174802da26737dbc0e9ceba2d89680e789b',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Auth\\Access\\Authorizable.php' => '91254997f939d4f8abcce6c85b374a2016512955',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Auth\\Access\\AuthorizesRequests.php' => '1d144d3507fda468356010988a9ca79f47793724',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Auth\\EmailVerificationRequest.php' => '48d55c16810b37b444a445097650760b57fd4be9',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Auth\\User.php' => 'fcdc485414734871ced7669650e5661eca2e87c7',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Bootstrap\\BootProviders.php' => 'd414fd662a9056939ec990b33b060d40293a7708',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Bootstrap\\HandleExceptions.php' => 'a46d407f936abfaca4bc99c037a50d2b49b821c1',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Bootstrap\\LoadConfiguration.php' => '3e54ecef45ea95fd1ec64567c09c68b6e92e93fb',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Bootstrap\\LoadEnvironmentVariables.php' => 'd223f82b5fa92373621f3cd97be71530c51f9ad7',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Bootstrap\\RegisterFacades.php' => '791b823f379007d96286a813df5401206dacb55c',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Bootstrap\\RegisterProviders.php' => '22c023f9b5556bd9aa2856bf0dae59f0bee76f5c',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Bootstrap\\SetRequestForConsole.php' => '8ebbbfb7e952c5af423662aca404e0ac3037c8fd',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Bus\\Dispatchable.php' => '4194f09b34dc78dfbb73870a9d38891add97b38a',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Bus\\DispatchesJobs.php' => '3f2e6a8a674ef01d4361ca7944fd756741025009',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Bus\\PendingChain.php' => '8caad2f1da85e3a7d69808677f6ebcc2d127a44d',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Bus\\PendingClosureDispatch.php' => '04fbcffb97fb3048001b5447132d5ca15e5802e9',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Bus\\PendingDispatch.php' => 'a4b83233f3103f496312900766c56b3498dab019',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\CacheBasedMaintenanceMode.php' => '08d97c1623b0fc6abbdb289b7264706c93e0fd85',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Cloud.php' => '9ea80f4125a2acce17672caf7efd3554ec281bb6',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\ComposerScripts.php' => 'e36dbe7fb7712225eca95b0505006eda0b4b9556',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Concerns\\ResolvesDumpSource.php' => '0ffa5a1b7c8776cf5509f8bad07b1e0b45a8ff52',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Configuration\\ApplicationBuilder.php' => '30645817cb6df08431e4d61040b9546ac5867b17',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Configuration\\Exceptions.php' => '9e922f107590e3a8d45a33a71e56092915643b61',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Configuration\\Middleware.php' => 'e7787a8401132cfd3cd52457a889337134f63af5',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\AboutCommand.php' => 'ddb080be12c67a68d5387d3a933138ffd08fc738',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\ApiInstallCommand.php' => '60b8b903c34c09598fdddf250a9c7f1a54aaa91b',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\BroadcastingInstallCommand.php' => '0ff151698d0565bf8fe5631fedd10c855abd6290',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\CastMakeCommand.php' => 'a2ba9f90bd1e0f7638c4c9651843da5da836ad40',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\ChannelListCommand.php' => '4fd2dbc4e429110d40589456ed0ae3fddf5861bf',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\ChannelMakeCommand.php' => '7bf980c507b1d8bf1c085c93eee26b6a248d96fd',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\ClassMakeCommand.php' => 'd58599845b13390ad19c4bf6164d8268612feb7d',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\ClearCompiledCommand.php' => 'b6044b89544ab079c5b60e1942169ad5cc2c11f7',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\CliDumper.php' => 'b7a2481c923b122425bcfac2945f6419e9bf8b6b',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\ClosureCommand.php' => 'ba0bc33f28f3d8c1c369e879102cfdb34b3d4db3',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\ComponentMakeCommand.php' => 'b74d48927432fffbfde7bbd58c9487c663ba663d',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\ConfigCacheCommand.php' => 'f567d5b1c4bbaafbea9381796ed0eb4ecdb35d31',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\ConfigClearCommand.php' => '0437b2bf0577718fd92e62845917976c7d05bdfc',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\ConfigMakeCommand.php' => 'b4e0874233d73adc94e19ca533deff0e8a0032a8',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\ConfigPublishCommand.php' => '53c70cf4bbc99a26392cf29f50681fa1b57a016e',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\ConfigShowCommand.php' => 'cd0281904916c5ea8b3cd2bb6bbaf014dda84830',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\ConsoleMakeCommand.php' => '78317a83a1564f721950d5f295beb113dc6adfc6',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\DocsCommand.php' => 'c5b37ccccc8c6295c94941d79e161188f12848cd',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\DownCommand.php' => '3d2542bbe19e3d8d1931bc2e676854470f5063e7',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\EnumMakeCommand.php' => '02bb0de34eada08ec453e4fec61c575e46de7138',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\EnvironmentCommand.php' => 'fe615d6d9c1bf1f8059b7cf6116624f342644288',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\EnvironmentDecryptCommand.php' => '7f289b1db78b5f5d85680dbcf1e37fe80837abd6',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\EnvironmentEncryptCommand.php' => '8abdbfeda66c5b7ae9aaf1fce0a0cdc2ed66944c',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\EventCacheCommand.php' => '6490f7a50912efbcafd87e41a9483536d38e362d',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\EventClearCommand.php' => 'b9925dced0665b7a258d8b1e88168518c39bef6e',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\EventGenerateCommand.php' => 'f3542ac5488bac784f6e7fb79d30811bf85d1f06',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\EventListCommand.php' => '8556d75a427cd53fbe6d229ffe72c07cf6b10d05',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\EventMakeCommand.php' => '21d3914b0cea5eb6de7202753753fa32a44215cd',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\ExceptionMakeCommand.php' => '0b376334ee90390eda8e9ac744b61210a08c0e2e',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\InteractsWithComposerPackages.php' => '6297da9ce233732086c509d192a71ded76761612',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\InterfaceMakeCommand.php' => 'da0d7f86cc7f233664892cbfb7a4f612f3c5c788',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\JobMakeCommand.php' => '5f54685edb19369a31203530d298ba7eecaaec97',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\JobMiddlewareMakeCommand.php' => '3ae587deaec42d18c436d36fbdc3fd3a5b70a66e',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php' => '0798a8b5b16d9dd920f1ab3e41c65f226846b02e',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\KeyGenerateCommand.php' => '63bfeb183dfdd1dd574819737c875adffd64a555',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\LangPublishCommand.php' => '8ec33ac95158e9e23f7287f2b309abe918a6129d',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\ListenerMakeCommand.php' => 'ab49d43afefb521596a8dd2609ea4c0615bdedd5',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\MailMakeCommand.php' => 'd9d5fd69cc1fcc8ca10578fd040ee67c3a4bf7b3',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\ModelMakeCommand.php' => '88658c2d551db98a9b09aaa721b5500a50dab549',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\NotificationMakeCommand.php' => '5663891e16d2291a95b1aad4a60ad6ac060c7ac9',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\ObserverMakeCommand.php' => '5686651ba07cd9ac80b3306e637a92e54d59da60',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\OptimizeClearCommand.php' => '6d82219d6b55b9c3a6e89305f81be690f20df36d',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\OptimizeCommand.php' => '162bbe27c08b540834dd34399d0808e413c41b86',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\PackageDiscoverCommand.php' => '81c7319e75b8ff0582f8e5dada61063a99b8aef5',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\PolicyMakeCommand.php' => 'da0392994ad8499f88fc4b6209189489f499a03c',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\ProviderMakeCommand.php' => 'fc1deb654c4e50a468e22fdb0ec526f92826210b',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\QueuedCommand.php' => 'a1bf06190eba5297ea117eccde654ad942978d30',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\RequestMakeCommand.php' => '445ca37071c88e89d2a221c94fe38d196f41dcec',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\ResourceMakeCommand.php' => '0e73b579a3f11ebc2cf7735770bb7ebdc0a5a696',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\RouteCacheCommand.php' => '9b822f4ff9a346faa1df62b9095a62660f761c73',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\RouteClearCommand.php' => '831c412b2dff9939e219e07b23bf2448961909c7',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\RouteListCommand.php' => '5b59326620b2824651f1f9e327713aee0a71119b',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\RuleMakeCommand.php' => '07967623c35f3162d61149322e44ade1b862428d',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\ScopeMakeCommand.php' => 'de442bdd3cdf52c22c2c3c017765417d6db478db',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\ServeCommand.php' => '3b8a91a08f996acc6f8a60f609e348864193b98f',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\StorageLinkCommand.php' => '550c422fd7f5de3826ba425f8510efed3ee9de12',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\StorageUnlinkCommand.php' => 'bb427d49533bda945714a0b931f0aa537d40cbe2',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\StubPublishCommand.php' => 'ef668eb374e888e13e174a6a5207fdfd5cda179e',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\TestMakeCommand.php' => 'bebfed30adef3a7847b6b1af135f026ccc39b64d',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\TraitMakeCommand.php' => '7bfa56b565387f19d526e19057ac39a75a4be3cb',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\UpCommand.php' => '46e7c1f20108f0972460dc88672c3295a97c587d',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\VendorPublishCommand.php' => 'cb694d2b432ce9ad6527bf59e8f63a6785dde393',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\ViewCacheCommand.php' => '55b76cb23b31e19b41c94f58a308cc867e498183',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\ViewClearCommand.php' => 'd70b0963a402baf4734f74ced6a51005ef3a4243',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\ViewMakeCommand.php' => 'a0fd03f109613d2c709cf1c2e396093cfcdc255e',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\EnvironmentDetector.php' => 'f538faac8d3a80143bca73c7483720c3a5559906',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Events\\DiagnosingHealth.php' => '0c73b90c73aa74fbda473bb73227230ac11ee8ca',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Events\\DiscoverEvents.php' => '8f94b5eb294efca25e0b8101a5f917a49a0cba27',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Events\\Dispatchable.php' => 'd399160d8f11cff82f50a9c690229b274358f60b',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Events\\LocaleUpdated.php' => '347c0257b893e912d89c42cac2b527504e1d9310',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Events\\MaintenanceModeDisabled.php' => '4bc9f4059735828e859fe7870e723c73907d47ba',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Events\\MaintenanceModeEnabled.php' => '88079ff8d9d58740ff1801e92904fe030911cb34',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Events\\PublishingStubs.php' => '2610c3d4923ac8d62f4538980290fd46271be52e',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Events\\Terminating.php' => '0aec22f8de9cb73212e9f618274454ccf578265f',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Events\\VendorTagPublished.php' => '8a9c1ccbe6dd629a053c90ec32489018f8253151',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Exceptions\\Handler.php' => '329deac6fea7c78eb652eeb8d92250e630b8991e',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Exceptions\\RegisterErrorViewPaths.php' => '62450d39c1b62a4a058e46d89b9dc8de732a877b',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Exceptions\\Renderer\\Exception.php' => '814a74614213166f5f14d19f3fc27fa905dc6d71',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Exceptions\\Renderer\\Frame.php' => '24ae4b5f3b0710a95d119cb6182e4dea96b49dcb',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Exceptions\\Renderer\\Listener.php' => '6c67845a864139163ebf70a59be996ebd1f50c3d',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Exceptions\\Renderer\\Mappers\\BladeMapper.php' => 'cf593f640f3cb8afa0c40233134a63a48e47dc55',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Exceptions\\Renderer\\Renderer.php' => 'e92bcad79f1c3791dc84352652a95f1156064377',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Exceptions\\ReportableHandler.php' => '8a7f8e986b78fbc58b15e66f00283777070fe344',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Exceptions\\Whoops\\WhoopsExceptionRenderer.php' => 'd00b53a4eec9069b0b74b7c2fb145c784b1d3537',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Exceptions\\Whoops\\WhoopsHandler.php' => 'b52572036702a912583488db1f0812dc1ee1f84d',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Exceptions\\views\\401.blade.php' => '7980c53b01adc226a2b9178128449d67fa28e046',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Exceptions\\views\\402.blade.php' => 'da3791d99d4e0d1f784ff046115fd3ad2d5e2f8b',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Exceptions\\views\\403.blade.php' => 'e760468ba69fc72beced3924bd2249a65b177537',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Exceptions\\views\\404.blade.php' => 'e0f4b298747af9c337f8196de01c7c56c0be53dd',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Exceptions\\views\\419.blade.php' => '8c91c60ffda19c80b559d11ce3a47d7062b65c7c',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Exceptions\\views\\429.blade.php' => '3bc7fc5eaed878f6e7cfdd8be986219e2bb0a679',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Exceptions\\views\\500.blade.php' => '9b3837d3a046ec80ed4ef1f01b0613de623003b6',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Exceptions\\views\\503.blade.php' => 'f3a9b6469bb0b9df05d19f994037b5af81873f5d',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Exceptions\\views\\layout.blade.php' => '6a8cbb3b970caff438c792a1ed46c8842c6b3a19',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Exceptions\\views\\minimal.blade.php' => '64948ed3842bb5c23187fea51db80caa17480970',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\FileBasedMaintenanceMode.php' => '75a9a66b6838b679ab69ff2c88c244290e956c04',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Events\\RequestHandled.php' => '7e4c953c8873ec6a6fd40abe28868db81ff5e1de',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\FormRequest.php' => '0bde160b72c50055293db9f8176fd6ea355af978',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\HtmlDumper.php' => 'ac79c054d6d4abb2afb038b3adab55e0e2e5d45a',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php' => '17805851b38f61571d5a4706f537bec030a0328d',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\MaintenanceModeBypassCookie.php' => '592159c629662d68ac3dba3e8d5f3002369f17bd',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\CheckForMaintenanceMode.php' => '027980103425a25cd277fca9b35ff9295fbb23ee',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\Concerns\\ExcludesPaths.php' => 'f85685d03e1e1fa12954fed8a42c29bf0458f56a',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\ConvertEmptyStringsToNull.php' => 'ea739fb208acb469768841e97847e210129a1035',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\HandlePrecognitiveRequests.php' => '04f67b672e303f5144769ad8795311f14df2fd6a',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\InvokeDeferredCallbacks.php' => '276da4e578d4104e66347b2b00d116dbbf88c9db',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\PreventRequestsDuringMaintenance.php' => '41af1c0aa604c57816e8d6fafc3fdf6f1d712249',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest.php' => '55a57b86f7ec6efcfcb56b3f75ca88b847af5ffd',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\TrimStrings.php' => '27de85743eacde58d3301e2ba2fe9a680fdcf5e6',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\ValidateCsrfToken.php' => '9d7130b71b764a9078743d75e383c7598f19e5e2',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\ValidatePostSize.php' => '8825014eb8679d870967c970126f98097cf62907',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken.php' => 'bf77704c704024a808c7b5f862bee0fd8a764307',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Inspiring.php' => '731ef025ef2c82c1b08eaf33d5df7895f5cfefa7',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\MaintenanceModeManager.php' => 'c5c8645985d23f75776e3b11dfdc7e3e6d70e821',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Mix.php' => 'ce6ac6f6d47aa8bd98957e0388c11f9a6b2b8900',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\MixFileNotFoundException.php' => '98f7c640183a47d93939f52dcd2a0d02d0057466',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\MixManifestNotFoundException.php' => '7daff6db7d730f101369add57e3fd615b498fb21',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\PackageManifest.php' => '6d73bb96c6b7d5361e443267155699fa3800f72c',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Precognition.php' => '5a09b38c2a4636ff6bb842a4cad4484291cdfb81',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\ProviderRepository.php' => 'f428571b7af314f49e4e4c6c94ae8a05fbe9b4a9',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Providers\\ArtisanServiceProvider.php' => '2c873e3c6f8e6c9af1953ac6284179d267ed2e5b',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Providers\\ComposerServiceProvider.php' => '8d31f71d928ca5bcfe8c30533014b4c4427ab9d5',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider.php' => '0344e3276f983cadd03c7eabdd9befe7f274b799',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Providers\\FormRequestServiceProvider.php' => '0b47ba4bda332f101fc7b0c0f3333b90ab83110c',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Providers\\FoundationServiceProvider.php' => '135a24f0788d611db841418405fabf29671f6287',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Queue\\InteractsWithUniqueJobs.php' => '2acef33aeee8bc3d21e72054e7b0672f2e3e5547',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Queue\\Queueable.php' => 'e8d3ceb73c3c8b02ec66382624b35a923a689eac',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Routing\\PrecognitionCallableDispatcher.php' => '67638c775e1d431776f8d4e85235e51383559b9f',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Routing\\PrecognitionControllerDispatcher.php' => '90dca8bd814283fbd6d05ddadacd592c6e961105',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Support\\Providers\\AuthServiceProvider.php' => '414057cbd562b2528e49d2180ca6efbec4b1ffe9',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Support\\Providers\\EventServiceProvider.php' => '1e0d7ddceaa00747993fcadb0a77c9d667b5cc86',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Support\\Providers\\RouteServiceProvider.php' => '4dd9930a8b97673bfd0bc0070e54a28149d58970',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Testing\\Concerns\\InteractsWithAuthentication.php' => '70fae867b42646ce413fb7e089c888c4c567ba9f',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Testing\\Concerns\\InteractsWithConsole.php' => 'ab5dc2984c76905ed026f93d0613ff5c85fb1c31',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Testing\\Concerns\\InteractsWithContainer.php' => '562e449faf8add7eccefbf1bcd072427c74bc0fd',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Testing\\Concerns\\InteractsWithDatabase.php' => '7afab8ed1df822dc8729d5625a3a8b87079f2ef5',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Testing\\Concerns\\InteractsWithDeprecationHandling.php' => '480eda30e7fb693970f6251597d6d9069e8a1e5d',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Testing\\Concerns\\InteractsWithExceptionHandling.php' => '0a39783b2221434bc39edda86726e577acaadfd0',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Testing\\Concerns\\InteractsWithRedis.php' => '3237e558802337bd85a32ed4034fe74161af2f6a',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Testing\\Concerns\\InteractsWithSession.php' => 'e57cf77a1fd1f26154557c5488a222d28060d962',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Testing\\Concerns\\InteractsWithTestCaseLifecycle.php' => '6fa3adb2cac4658267be7b575a78fab5af63b831',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Testing\\Concerns\\InteractsWithTime.php' => '6c2f63a96da8fa004d13296a425d1e1c6a555e78',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Testing\\Concerns\\InteractsWithViews.php' => '968c7fab95801ccb28ebd6646d45ced68ba7fd92',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Testing\\Concerns\\MakesHttpRequests.php' => 'a7fe0dde40762b9f5accd068e8d181ca53d7a8c3',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Testing\\Concerns\\WithoutExceptionHandlingHandler.php' => '4863e0f5fff37e7943e3ea62ada784e1c5fae965',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Testing\\DatabaseMigrations.php' => '3d18ec2f0c08be9689e176da37f49de523bc5f19',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Testing\\DatabaseTransactions.php' => '141001c73ea7e67b5ad267bfcc0f3e38c1a962e0',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Testing\\DatabaseTransactionsManager.php' => 'ca60ec3eb06ac5f1aac777be461048df26b8b7c9',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Testing\\DatabaseTruncation.php' => 'b0c5c8e4899d3488e8ed96a9ff71e492ee00537e',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Testing\\LazilyRefreshDatabase.php' => '520a51a9750defa92f3862bd7c9c6f80dcc31115',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Testing\\RefreshDatabase.php' => 'd98d6e9908eaf2b6d88c3e776808edf9972fa935',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Testing\\RefreshDatabaseState.php' => '336e0ab44bc559acf2615ae0c8b9fed335374472',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Testing\\TestCase.php' => '05842963e2f40babf37eda5bf07e12ab7ac9c757',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Testing\\Traits\\CanConfigureMigrationCommands.php' => 'f9a651d1e08976c0af28f6557228f475f77fb3f2',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Testing\\WithConsoleEvents.php' => '0a5750bfff12e9d00efb5ac08f071696b6e95f4a',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Testing\\WithFaker.php' => '2a1f2933e235f57d01b7200f1a141cc38626f5a9',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Testing\\WithoutMiddleware.php' => '33bbd8c543c641f059d7131537949ef662a6c1f8',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Testing\\Wormhole.php' => '43d40fa524c8cf6b8052a0a245540b77da28f1e0',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Validation\\ValidatesRequests.php' => 'a214aea94a4b9af52fc2f34f2711b62ea3748a32',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Vite.php' => '560c06e96415d9e02734e776a2cec9cad54f5432',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\ViteException.php' => 'b869dfb876277898c74f9a1f2921c7ed0c9a26a8',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\ViteManifestNotFoundException.php' => '33d2c66b1e54119a782e074e76f8f4df0c71509f',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\helpers.php' => '769daa5dd7851c5087423c4198251fd02068d584',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\resources\\exceptions\\renderer\\components\\badge.blade.php' => '736e4c3af2f4cdbef309d3e2ecd4a0e5ca1bf041',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\resources\\exceptions\\renderer\\components\\empty-state.blade.php' => '3a46f063d3ffea8e42b8a3e7a75305c190533fb1',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\resources\\exceptions\\renderer\\components\\file-with-line.blade.php' => '60175bd37052d3c7d6322095e22a7c45cabd5efd',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\resources\\exceptions\\renderer\\components\\formatted-source.blade.php' => '39f4ae522815766af9e56a1a267db303df0974cd',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\resources\\exceptions\\renderer\\components\\frame-code.blade.php' => '49a32091493b0ca2f40db595836b8300405b94c0',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\resources\\exceptions\\renderer\\components\\frame.blade.php' => '544715358059932cebbaa00ce42bed15b0501594',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\resources\\exceptions\\renderer\\components\\header.blade.php' => '5d74cb6cfa0790f9917e6132d412ee1b623b2a9d',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\resources\\exceptions\\renderer\\components\\http-method.blade.php' => 'ad01746c50a957232857fa202293373c86082a14',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\resources\\exceptions\\renderer\\components\\icons\\alert.blade.php' => '6880328dc89637a5eec0912ee07a775ce198440f',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\resources\\exceptions\\renderer\\components\\icons\\check.blade.php' => '408a1868f80d47a2298f8c29b1ba9b2d872da21e',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\resources\\exceptions\\renderer\\components\\icons\\chevron-left.blade.php' => '069b26a3a1996ce23bfd2af851220e532d3b74ef',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\resources\\exceptions\\renderer\\components\\icons\\chevron-right.blade.php' => 'cd55783c26b8499e5994470a6883112117edbc1a',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\resources\\exceptions\\renderer\\components\\icons\\chevrons-down-up.blade.php' => 'e7c3e05d57d7a4970a8fb915939907925e79354a',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\resources\\exceptions\\renderer\\components\\icons\\chevrons-left.blade.php' => '859d10ec76c384bbb1b1f206bda1c3c5cbfa102f',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\resources\\exceptions\\renderer\\components\\icons\\chevrons-right.blade.php' => '017c60199bc02478cb866ee2874ecdd2f289c97c',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\resources\\exceptions\\renderer\\components\\icons\\chevrons-up-down.blade.php' => '40145a24881ec9886386891d498664f5fa2eb3b8',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\resources\\exceptions\\renderer\\components\\icons\\copy.blade.php' => '28182aee2b07e65e6045f368c8506c64dc4f0c2f',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\resources\\exceptions\\renderer\\components\\icons\\database.blade.php' => '6464d30eeefa961b65cb73fb335ad9fd920f37c7',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\resources\\exceptions\\renderer\\components\\icons\\folder-open.blade.php' => 'c49b5bb793d44511c7590b74d618e1e692ddb083',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\resources\\exceptions\\renderer\\components\\icons\\folder.blade.php' => 'bff57f1c0dcf2e6ddea92b7a0c3a630fe54e3513',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\resources\\exceptions\\renderer\\components\\icons\\globe.blade.php' => 'e7ea1762d469c9fc8f4cd03c269209e393e5d161',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\resources\\exceptions\\renderer\\components\\icons\\info.blade.php' => '2e4dc188144b067857bfa1ae2dec1b6d2b7f45fe',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\resources\\exceptions\\renderer\\components\\icons\\laravel-ascii.blade.php' => '27ac782ba23d6c88885943ed9e0601a4bb7131ad',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\resources\\exceptions\\renderer\\components\\laravel-ascii-spotlight.blade.php' => 'f789f55274db7054d6f0978dbb107c350f57d642',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\resources\\exceptions\\renderer\\components\\layout.blade.php' => '5afde15e6b90ca7a3f0b45c229148e8dd3f16633',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\resources\\exceptions\\renderer\\components\\query.blade.php' => 'cfae8bb32f4d217ed550267fc636f4f55ecead9d',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\resources\\exceptions\\renderer\\components\\request-body.blade.php' => '2c7b51ddd3c11bba1e53413deb51c7f33921e85d',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\resources\\exceptions\\renderer\\components\\request-header.blade.php' => '72f988778f9475a36d1419e673fe15fbbf72fc6f',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\resources\\exceptions\\renderer\\components\\request-url.blade.php' => 'edc134605bb3d878b9408918f2770c19d71ae1f1',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\resources\\exceptions\\renderer\\components\\routing-parameter.blade.php' => 'afd989236ba29f205d12a3e8f97c4414134defe1',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\resources\\exceptions\\renderer\\components\\routing.blade.php' => '6cc720df12beebad265855fd46c91843617ce018',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\resources\\exceptions\\renderer\\components\\section-container.blade.php' => '0b692e5192056d7b8770f3c016ce46e2ce459499',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\resources\\exceptions\\renderer\\components\\separator.blade.php' => 'eef2a2e8d6da1d44a59155d7bf6af4d27cf575c5',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\resources\\exceptions\\renderer\\components\\syntax-highlight.blade.php' => '19c104801a1067e4238a51a968487e1f43fd6443',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\resources\\exceptions\\renderer\\components\\topbar.blade.php' => 'f1ca3b98bfff5df9a658a012af13fcbfb2057ce8',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\resources\\exceptions\\renderer\\components\\trace.blade.php' => '63fb0b1b449cab662a2334924e51c6cf9b0aa058',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\resources\\exceptions\\renderer\\components\\vendor-frame.blade.php' => '6770800fb0e05e524975be738cfb65a2d953ff13',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\resources\\exceptions\\renderer\\components\\vendor-frames.blade.php' => '901bb1bdb2370908e3e07fa798e18d1001011361',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\resources\\exceptions\\renderer\\markdown.blade.php' => '68f06467b475ea29251f5c9b24a076fe56ca3aca',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\resources\\exceptions\\renderer\\show.blade.php' => '59080edd17110e6f05e81d9aa03780bb3ec95ad6',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\resources\\health-up.blade.php' => '7b2678649f358a9531e75d36a997630c06597b90',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\resources\\server.php' => 'a3f37e6d776d7c9ea429c115b68facfea017933c',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Hashing\\AbstractHasher.php' => '59d52f2268b02f6c5061432738cd03d1d2a74090',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Hashing\\Argon2IdHasher.php' => '03febac1199df56c73009712b07803bcb65c843f',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Hashing\\ArgonHasher.php' => '957ff6a395dde4522f13bf4228b2da1c98512d22',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Hashing\\BcryptHasher.php' => 'e8f32134a7c5a2951ce62d7ac40262d70962cfa4',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Hashing\\HashManager.php' => '4766ddc4e9f08f0462fc57edaa22e4d7483ee130',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Hashing\\HashServiceProvider.php' => '3506bbb0643c1402a3d78c0eb1b5b312113df4c0',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Http\\Client\\Batch.php' => 'bcb85d2f9eacd4b1c4e2c90f6c475e10a740827e',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Http\\Client\\BatchInProgressException.php' => 'f9a0a7f0c9e6aa8e367cfdcdd91000589386e926',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Http\\Client\\Concerns\\DeterminesStatusCode.php' => '066e5758a36142747b5daf25718529e2cb400587',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Http\\Client\\ConnectionException.php' => '37e2ee4f0e08538bde2479ada1c67a3ba774fb4c',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Http\\Client\\Events\\ConnectionFailed.php' => '528c2fb2d2e26c9392680d4679d60fc36f89eb34',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Http\\Client\\Events\\RequestSending.php' => 'f5743faf94cbbefe135b0d538268c84441ce9afb',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Http\\Client\\Events\\ResponseReceived.php' => '824998e726e1f41eb9848e77865138daa1f1b01b',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Http\\Client\\Factory.php' => '55c6a01d2e721d6eb74ca57245b3a0285b1eacac',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Http\\Client\\HttpClientException.php' => 'c17addebc9ac2bb9ce4687891a9d676d3ca4c0eb',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Http\\Client\\PendingRequest.php' => '7ba249021926ce898b665443cc1744f5eca5dbcb',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Http\\Client\\Pool.php' => 'bd140a2189388bd5a9d872600df81e860446d380',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Http\\Client\\Request.php' => '00a9893690190f1992b5c3ce3fcba6d9037afa2b',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Http\\Client\\RequestException.php' => '2fd49444366a55886cee10fb0305f5a76d53886e',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Http\\Client\\Response.php' => 'f60d5819ffffe57982ca676aa5fd7f5085564040',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Http\\Client\\ResponseSequence.php' => '7ca1e996b4de7da3a63ffc7ec808b81c070f2823',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Http\\Client\\StrayRequestException.php' => '62ba9c1260c6270c7189f0fd9d4b1a4ee3e4d637',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Http\\Concerns\\CanBePrecognitive.php' => 'd27f70c1b087ed110f7790ca58c0e38daa109db7',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Http\\Concerns\\InteractsWithContentTypes.php' => 'dfb357cfc1b2c449b3aa4fa72883f03c7eb0263b',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Http\\Concerns\\InteractsWithFlashData.php' => '519fce0cbeeff7d74cca73adfc00b1b470283ebe',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Http\\Concerns\\InteractsWithInput.php' => 'eb7b922fda41a154a240f8be48a1450d6f3e2aa4',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Http\\Exceptions\\HttpResponseException.php' => '804d4ddaac0e7cc44dd69669166241f46f016352',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Http\\Exceptions\\MalformedUrlException.php' => '3ca4366f4983173bdee84a48239c1bb816033dee',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Http\\Exceptions\\PostTooLargeException.php' => '7a57f15576ed100da84189585994cd251035ab00',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Http\\Exceptions\\ThrottleRequestsException.php' => '092fb17f772eb0547d0c4dc3de9b6acb165c563f',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Http\\File.php' => 'f0c5cb76a3b09d87494433fc09941f7412b1935a',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Http\\FileHelpers.php' => '6d6db598b45d7a56d31cf3a39c85843c61134300',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Http\\JsonResponse.php' => 'f5b4ed61e586f804727cbb9312dc65c323329533',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Http\\Middleware\\AddLinkHeadersForPreloadedAssets.php' => '7a71c111c5783cf0c8e60335d50acd063e995410',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Http\\Middleware\\CheckResponseForModifications.php' => '72cfeab3dedc5f227ebe9d78830e8be1a9c7857b',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Http\\Middleware\\FrameGuard.php' => 'b701a4fe337119e7fa1abc8dd1fce1b9f5432de1',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Http\\Middleware\\HandleCors.php' => '005a574a0b2473ef8d9ca8b80e95119244fdaa1e',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Http\\Middleware\\SetCacheHeaders.php' => 'a2dcc6c83bd832cc92276b9ae6325a7b1ff442f7',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Http\\Middleware\\TrustHosts.php' => '76ae02d30330f4250de05ad19a8a0504f2d35587',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Http\\Middleware\\TrustProxies.php' => '4c71c39518104ba69f1ab34b13ce5ff38ccedf3b',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Http\\Middleware\\ValidatePathEncoding.php' => 'a2925299231c25b81109545dc09d566e0e400789',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Http\\Middleware\\ValidatePostSize.php' => '8477e71bb5a295f063f78781d354823badd6cfb2',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Http\\RedirectResponse.php' => 'ed442edd7ab9b814a0dd0fb428f5b8a3582398bb',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Http\\Request.php' => '82226ff91705f21ad802d6229ab83349c15e0323',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Http\\Resources\\CollectsResources.php' => '52ec261fbe611439b317752264b7f989efb5f973',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Http\\Resources\\ConditionallyLoadsAttributes.php' => 'a2b4153521ed4b192924de84996848a24727119a',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Http\\Resources\\DelegatesToResource.php' => '2c83ba0cb418da04c1325a7a9304ab2ec5b74e67',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Http\\Resources\\Json\\AnonymousResourceCollection.php' => '0650af8910eea6f6fd6eb021722df9ccfe15cddc',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Http\\Resources\\Json\\JsonResource.php' => '6432a1f7ebb2d8d3c06f128f37b52cbb20f005bd',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Http\\Resources\\Json\\PaginatedResourceResponse.php' => 'ab68bcbc46d3a293b19eac26074ce292caef62f5',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Http\\Resources\\Json\\ResourceCollection.php' => 'a4bb1cd7282f2b91d4cc141b5ec709e5e46147e0',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Http\\Resources\\Json\\ResourceResponse.php' => 'd403b31cac91afa31fe299d5ce79a17a75cdd655',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Http\\Resources\\MergeValue.php' => '4fd1d736781658f56f590a618437f6adecc75a6a',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Http\\Resources\\MissingValue.php' => '06ab73768b5007e5e6bc862541676c52bef3546b',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Http\\Resources\\PotentiallyMissing.php' => '2b277b4c458685476b55fc89e2e28da5171b3900',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Http\\Response.php' => '2ba636ef153e9fa598681a00bc07f9b8b6693625',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Http\\ResponseTrait.php' => 'f11deebb3d0528e5f88df9226509a3d619d07a40',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Http\\StreamedEvent.php' => '13a99e0913cf8f3f51520fb8ec68381206726a93',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Http\\Testing\\File.php' => 'efecd2e52d0f882550058efdab92a91ab2430d80',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Http\\Testing\\FileFactory.php' => 'b395a237416e8ac7ec98dad41ed77173a6203875',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Http\\Testing\\MimeType.php' => 'b8a57d6a44c365d75828cf1fcb4eede469b3a3c4',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Http\\UploadedFile.php' => 'd57e8f812289dd294b4a8e95921813a94cab225f',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\JsonSchema\\JsonSchema.php' => '1a20f211bb34e02406ae92db957d580e70fe733f',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\JsonSchema\\JsonSchemaTypeFactory.php' => '90b17a5695b88eeb6dbcf65fcc7a6d56650c3bcb',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\JsonSchema\\Serializer.php' => '3e71bc63c6b40b3756749ea337325de0e139f012',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\JsonSchema\\Types\\ArrayType.php' => 'dcebb28b79a1126a644c2d0e985f27a5ad767399',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\JsonSchema\\Types\\BooleanType.php' => 'bd425defdcdc261e198f621bfc61ecc3101c2b8e',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\JsonSchema\\Types\\IntegerType.php' => '4bf1f141aade7d1017bf54eb898d939db75d4de7',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\JsonSchema\\Types\\NumberType.php' => '870aa2a4bf974f88b3fd61e11f5ea6996c183d7a',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\JsonSchema\\Types\\ObjectType.php' => 'e55a6935634dd06d8e71ef8f1304ef7bb951069c',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\JsonSchema\\Types\\StringType.php' => 'e89f3728eb9a72524ca67ab9a565cfd12b148c8d',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\JsonSchema\\Types\\Type.php' => 'df1cf839dd660eda9e4bf95ba5c28c03965a81f8',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Log\\Context\\ContextLogProcessor.php' => '1f72b00b01a05b578e24f57f02abb0b6a80c01da',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Log\\Context\\ContextServiceProvider.php' => 'e7c29fdf3c9641b5f227438d4c95ab36743924a7',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Log\\Context\\Events\\ContextDehydrating.php' => '972eaa8cb648f0a89984cee25608b34e1e637f6c',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Log\\Context\\Events\\ContextHydrated.php' => '649746766208d51b1edce25248da17bfb20b834f',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Log\\Context\\Repository.php' => 'ee94fb86bdc25c5d9b2cefd9f50f7c97b1a058cd',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Log\\Events\\MessageLogged.php' => 'b3d4ff7e297c6d977f7924a601b6a37a618bd86a',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Log\\LogManager.php' => 'edfd69701fd01156c73aec2c9a1a767cec142c7f',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Log\\LogServiceProvider.php' => 'b5a9552332bae301b4474ec998622d2ce956822d',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Log\\Logger.php' => '2e4b8179b33acc65afad26117e6565790ebf064e',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Log\\ParsesLogConfiguration.php' => '6c08840af74b2380139a9cb739d13827ae1cc97d',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Log\\functions.php' => 'dfe31b985955378d241ca8c0778d5375fe4a4aa3',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Macroable\\Traits\\Macroable.php' => '91c990dec7738ac8b38faaf09751c7ebdc7580eb',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Attachment.php' => '7224686b7b4908c4d6f2bff58d894fd46308668e',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Events\\MessageSending.php' => '6f3e479a1f2fc0eb3308a5c4c0c142db779276e7',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Events\\MessageSent.php' => '80f7a2bcb022eeb87b46471ed29cbfff02530e8d',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\MailManager.php' => '3a88f8a9bb080d39c0d847b105f514cd04bd2b7d',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\MailServiceProvider.php' => 'a4ec098275d081c1e1b03f15a4e9d8fb31425ea2',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailable.php' => '1303fc1fdeb897e4e5324f2d6489d8f7ee47281f',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailables\\Address.php' => '3597e9201cc8841e1e60dc016d33ce66f54f4176',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailables\\Attachment.php' => '2171cd5790208617358ceb8e5dd08b69efbcf2ca',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailables\\Content.php' => '9c75b5a5632081e6165286992f0858091ba100b5',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailables\\Envelope.php' => '1bae1a6ef6fbd21354ebe4c3f3bb166f4c9906be',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailables\\Headers.php' => 'cc4aee5618c84e43182c6750d8d50360c5b9a60b',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailer.php' => '721f8d10ce2553067b51c74e4990d8c27e6b31ae',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Markdown.php' => '144338ef6e2e1ada3a8c124295bffe607aad95dd',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Message.php' => '1b275e3e82bbd48892a47aaf7d6b613ca85edd08',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\PendingMail.php' => 'fade3c55c7f3a587c5f5f293944b53b6700655f7',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\SendQueuedMailable.php' => '559897aedfda72beb0a94167ae7d403ad856a957',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\SentMessage.php' => '7f5f273ae3f1ee44924463cf1f7a16e994689331',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\TextMessage.php' => 'a4b49f8d2edeb67b688d51f8114fcfe9d2d4fbe8',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Transport\\ArrayTransport.php' => '7f46aedd51143bd388140143a7f0d9680debee15',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Transport\\LogTransport.php' => '573f4e577ae994a63c604b4c62620fa2ae999546',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Transport\\ResendTransport.php' => 'bcfcdb37bf2a8eb56884f751eb7b3ebfde459c5f',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Transport\\SesTransport.php' => '4a063f7f63a1cacb7400bc37f53cdbce8a89e2ee',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Transport\\SesV2Transport.php' => '9a56df77157b2ba190b4dadaf2305a487e43aa5d',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\resources\\views\\html\\button.blade.php' => '8f2d9e05ae2f5d1b71350e29275758cbc5c90df6',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\resources\\views\\html\\footer.blade.php' => 'd8c59bfbd59462761b4912acfc582e0f527f55e8',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\resources\\views\\html\\header.blade.php' => '8a88fbc8e94c78ead24df58e60f59b0b412a440e',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\resources\\views\\html\\layout.blade.php' => 'e665f98c7963278145424441f865f46a17ea8f33',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\resources\\views\\html\\message.blade.php' => 'b8127997b9bd1e5f19b823d39c0f1e62070d3827',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\resources\\views\\html\\panel.blade.php' => '642ddb0136799150b5e0242611cf873a058a2470',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\resources\\views\\html\\subcopy.blade.php' => 'f1d0bd9382f3405d60ff40499958b582742383bc',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\resources\\views\\html\\table.blade.php' => '42a47ee389e2733b96401821355d5575f6a58ad6',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\resources\\views\\text\\button.blade.php' => 'd6bb0bef7d9b171365f08541350df8df19a384ed',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\resources\\views\\text\\footer.blade.php' => '408b898b023f30f031f6c219bdc1761212e2b980',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\resources\\views\\text\\header.blade.php' => 'd6bb0bef7d9b171365f08541350df8df19a384ed',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\resources\\views\\text\\layout.blade.php' => '468592a271fe489fa0cd25b6e84fb3e2fab2ad4e',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\resources\\views\\text\\message.blade.php' => '3fba2ec255fd993b98ca441d231047922f6cf249',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\resources\\views\\text\\panel.blade.php' => '408b898b023f30f031f6c219bdc1761212e2b980',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\resources\\views\\text\\subcopy.blade.php' => '408b898b023f30f031f6c219bdc1761212e2b980',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\resources\\views\\text\\table.blade.php' => '408b898b023f30f031f6c219bdc1761212e2b980',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Notifications\\Action.php' => '65b02fcba7215278b9192fc96a7f7582619ab4f3',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Notifications\\AnonymousNotifiable.php' => 'd1c433df3e0c89585c063c91e43e11a68eec689a',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Notifications\\ChannelManager.php' => 'c030ad3c0300a49d5f81a6cbf3ada4f1719b7a37',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Notifications\\Channels\\BroadcastChannel.php' => '90749b380e82217edf98c5a474ac87d9612a0350',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Notifications\\Channels\\DatabaseChannel.php' => '576ef4c999e7bb79c8f61d17af8d08618aa18c76',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Notifications\\Channels\\MailChannel.php' => 'bdbaa5a86a31e913a53bdcec9452ce51c13b4e7c',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Notifications\\Console\\NotificationTableCommand.php' => '3a0115c48b7a939360e8c0d31ad569ddce069cf4',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Notifications\\DatabaseNotification.php' => 'd4ff5d3d60867420d45a99f6ed62822cc0f3b9c6',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Notifications\\DatabaseNotificationCollection.php' => '3b86966ce7d82aa4eb95d93aaba12a7158f92778',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Notifications\\Events\\BroadcastNotificationCreated.php' => 'c2e19e9d3d9c00cf4f81fc2237e87e1b1dd19e9f',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Notifications\\Events\\NotificationFailed.php' => 'ec892b950918c7c3bb4f7be2d3ddec4449c7425b',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Notifications\\Events\\NotificationSending.php' => '7efff2d296c31bc5ec5b42da29c3ed2af23fec5c',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Notifications\\Events\\NotificationSent.php' => 'fd223b1de61b0708ea419efb4fba9c65bc0c2306',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Notifications\\HasDatabaseNotifications.php' => '3eea46871383e0a4999844cd785be892ea382e19',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Notifications\\Messages\\BroadcastMessage.php' => '51fc7ef91049423a42463327f6e30491a84b3956',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Notifications\\Messages\\DatabaseMessage.php' => '4230192c9e0f35a99e31cdf5036ac4898c7440ec',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Notifications\\Messages\\MailMessage.php' => 'd3c604faf268ac662c11e45b86addbc7be72a97d',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Notifications\\Messages\\SimpleMessage.php' => '995ca484f27b71a051a99e6079a0764222e19ab0',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Notifications\\Notifiable.php' => 'ce236b81f9a33c2402b76b978f00eb72c6918d33',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Notifications\\Notification.php' => 'e64cb4e9a718995ac271412bcea8c7c174310dc9',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Notifications\\NotificationSender.php' => '70aba9fe967a9831b76406fe3352021b8d7079dc',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Notifications\\NotificationServiceProvider.php' => '797ce14019316d4d6a1a0985436492c09f98b175',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Notifications\\RoutesNotifications.php' => 'c14b7d3f51d28915af5d189b67aead36b13c7143',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Notifications\\SendQueuedNotifications.php' => 'ebfe08881fb7f60e94107be147428be6d80ad516',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Notifications\\resources\\views\\email.blade.php' => 'f77afdd876e1e61ed96d51e329714705ee893a59',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Pagination\\AbstractCursorPaginator.php' => 'a39dfb1afe63fbaec64d1cfed7b2ada18ef5a0de',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Pagination\\AbstractPaginator.php' => '1e2c442f6d6729ab9b3d66b4c2adbfe5219d8d02',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Pagination\\Cursor.php' => 'd55b8ca62da2818083757e78c44c367def420bcc',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Pagination\\CursorPaginator.php' => 'bc88f687061e3dbe54f23c28794b627183508230',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Pagination\\LengthAwarePaginator.php' => 'a843695a824388ae85b179e53f9684f4f442fbe6',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Pagination\\PaginationServiceProvider.php' => '0a51c3e39fe4b6a1f34a2a55f2daf8b23ad1cfb5',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Pagination\\PaginationState.php' => 'ac8bb4aa997472366b3e5dda3034db40d6cba256',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Pagination\\Paginator.php' => '96a1bdcf21e0627724c841f63aa4dbb4c7bac2fd',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Pagination\\UrlWindow.php' => '8b67a12f7333de5cbfcead0bad569a50e02fbaaa',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Pagination\\resources\\views\\bootstrap-4.blade.php' => '7a2980ac1eccb40b52874257fee38fc773e6f9d9',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Pagination\\resources\\views\\bootstrap-5.blade.php' => '1be4e6d7af1f787159ed6771520b6670d46fbb4e',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Pagination\\resources\\views\\default.blade.php' => '3b7c5c66f4d3bfda76fb61624b0fe579fa856b94',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Pagination\\resources\\views\\semantic-ui.blade.php' => 'f3e54de42e3605452948ba150f1db0dbba4d0172',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Pagination\\resources\\views\\simple-bootstrap-4.blade.php' => 'aeedaf9b9ade76b613d2b5f10c976383649763a6',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Pagination\\resources\\views\\simple-bootstrap-5.blade.php' => '42867c3536b658554614ba943d64c53ec2e17f56',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Pagination\\resources\\views\\simple-default.blade.php' => 'b7366393d32775cbb39d1705f210ea117cdff2be',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Pagination\\resources\\views\\simple-tailwind.blade.php' => '7afc984fc5356bcd5c8727d3b4b87e6ac5e29a7f',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Pagination\\resources\\views\\tailwind.blade.php' => 'aa2197d1586a7d39546c64f7bc2ec4bb7e6f307e',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Hub.php' => 'cbcc7bdb6f06dfe5755fa921635bb4349d0e005c',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php' => 'bce887f7f44cb7d3c2f4aca44b052d4f66976a08',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\PipelineServiceProvider.php' => '75f217eeb2672d4c4cb28961511dcb778bb16363',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Process\\Exceptions\\ProcessFailedException.php' => 'e617c878eed07ada69c96f30fc8d28498366e43e',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Process\\Exceptions\\ProcessTimedOutException.php' => '31ff2e431840ce81a55746fbd868ca62f313d799',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Process\\Factory.php' => 'f066fab5cbd4efb29f015a6999d040bf92663e7e',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Process\\FakeInvokedProcess.php' => 'd79bd5ae7edd5410ab39bbf09548c09ba6dab800',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Process\\FakeProcessDescription.php' => '7f2dc5cb4157810a5e8e1c9ff3c952e1942375e5',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Process\\FakeProcessResult.php' => '0762fcfe094f5894934262c1a51a5b522f151c84',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Process\\FakeProcessSequence.php' => 'f199846cdcaa7bd4d15a531f5895a58fd47807ac',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Process\\InvokedProcess.php' => 'fdc8bfef2ed414472d8ec3c43728b54820f23c31',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Process\\InvokedProcessPool.php' => 'e386e0806719efe610e47dca508b5228d198a617',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Process\\PendingProcess.php' => 'd3978f1087d0acd906be42fb48edeb4e8fd962c5',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Process\\Pipe.php' => '0e2ed90c6a17c8ee1e2909da7c0d2de698b0b78f',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Process\\Pool.php' => '2f2a5194aa9d1d58eff16f3d9d797ec1f7cefa49',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Process\\ProcessPoolResults.php' => '93e3169d236d4a8f314106d397c07a9c0a90b162',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Process\\ProcessResult.php' => '4794da4f06f8988090494c6c48b34373d7837dce',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Attributes\\DeleteWhenMissingModels.php' => '1f1418fd7ae9ba1472e0283d99d0837523dbfb39',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Attributes\\WithoutRelations.php' => '5f1818f78f93e50783a5e0802c54978306ad72af',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\BeanstalkdQueue.php' => '356d5b06e8538238778d1d47f9024f2af6352eb8',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedClosure.php' => '54d0e948e76567fb7c76f78f21df258c3be38757',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php' => '54918f8ecc6fafd820e407d446a998cd07886d7f',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Capsule\\Manager.php' => 'c56643c910b61c8483f293a1a2fdb667099efecb',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Connectors\\BeanstalkdConnector.php' => '1ffe47b8cf531032a18f7814327914ed98d52ecc',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Connectors\\ConnectorInterface.php' => 'dcdc2848163e55e58936eb5e34a87fe6763bde76',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Connectors\\DatabaseConnector.php' => 'eb4d1c8065483567862401799f09a7c92c9a3fc2',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Connectors\\NullConnector.php' => '04a47a4a6e371a441b783a63987ff587a2d5c03a',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Connectors\\RedisConnector.php' => 'e1935612486b2e77804f5db7282a04be96a141d0',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Connectors\\SqsConnector.php' => 'b37c2621623fd0f3e4c8073b7aaefc6b65f7949a',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Connectors\\SyncConnector.php' => 'ee73ef04989ad8b0ee3a92cab7646f3ffe37c705',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\BatchesTableCommand.php' => '0c9e3d6f0e25a85e3e933273498b5d6008e65633',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\ClearCommand.php' => 'cfa3bd83ac22addf321f71264561ab9a93811c5d',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\FailedTableCommand.php' => 'cf0bbf9a6b813a93c7c0d16cfe71b38160d11867',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\FlushFailedCommand.php' => 'd52fa2deb99b44744dfc2acd1f12727f81b8dc06',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\ForgetFailedCommand.php' => 'ff8b0ed85e0646a243c9cc54a4247851a7be4142',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\ListFailedCommand.php' => '7a3aa3d1bc3c5b6e69aca2be4179895f4ff27450',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\ListenCommand.php' => '165a3ca535a211cf97b24aa9e87a727ff0744e15',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\MonitorCommand.php' => 'ae98aaf4e18432977815f9ce2dc0e744d89e3ce0',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\PruneBatchesCommand.php' => '783e8ae95b3668983edd893d44ea1c0575945638',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\PruneFailedJobsCommand.php' => '27139e26378424f3669009e72c99ffebc2e53860',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\RestartCommand.php' => '20030ad57dbaa7112ecfd88712d214d2dff7d48a',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\RetryBatchCommand.php' => '2af624e9b04d69c82b3cc43cc9d0b7dd7db93e7e',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\RetryCommand.php' => '55911da253236d75c1a4587f6338ec78099f5c79',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\TableCommand.php' => 'd6bce8062667445407c7864797f9c626940890bc',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php' => 'b0db3c2a129a7d75f06b94ce380dc3b03399d805',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\DatabaseQueue.php' => 'fffd6fb4cdf9b85e1cad0c8ef967d53a64a14bdb',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Events\\JobAttempted.php' => 'b3a73583a0ec53e075215bb855654e3cef664382',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Events\\JobExceptionOccurred.php' => '4b40eecb8548c67d3ba6a720ae00b77cf46ee4a2',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Events\\JobFailed.php' => 'fc722506b24ce706dbfd83c6df3acb6e9d695182',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Events\\JobPopped.php' => '3a6359c2c8059920039d314fc41aa6e8abea24e8',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Events\\JobPopping.php' => 'cfb4bc71e18d61443496c18718d9eff81f788672',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Events\\JobProcessed.php' => 'ddcf3c023fb7f594be9e6c52922b593a84db70b7',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Events\\JobProcessing.php' => 'b199d5f152e3a3bb71f7af8f2d1bf52a2bbdf0c7',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Events\\JobQueued.php' => '2916332b09113849665686cbfa772b9c6da79f3f',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Events\\JobQueueing.php' => '23c3f517846ba471efe2210a61b90d4e1a703aae',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Events\\JobReleasedAfterException.php' => '159e38a1529a9bb9f7e1e706eaaec0848e34bd19',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Events\\JobRetryRequested.php' => '493d271a89dfeb630141ce88182d567df763d939',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Events\\JobTimedOut.php' => 'e347abe004be83d350195982c0cedb7ae4ffc8f5',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Events\\Looping.php' => '6ee96d0936c35ce166390c2bd9106c3c9f8cba7d',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Events\\QueueBusy.php' => '0623e3adbd7b667840cf42ce5e91d21933695d4f',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Events\\WorkerStarting.php' => '19d7d3cbacef940b02269f80cadc0b39f06a2d33',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Events\\WorkerStopping.php' => '67580b4f4291733c137d9492d135e27fc1f46377',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Failed\\CountableFailedJobProvider.php' => '0b87832b9bdbf7d47f3775cfdc8e25f97ea2ef87',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Failed\\DatabaseFailedJobProvider.php' => '6ea2ee0758e2f786631b23f16d29203312b60c05',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Failed\\DatabaseUuidFailedJobProvider.php' => '51624772c319c1e74c35a03d25b13b81ad8c090e',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Failed\\DynamoDbFailedJobProvider.php' => '70810766d85e18ad361ac4ba53d691a22581710f',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Failed\\FailedJobProviderInterface.php' => '19b0e19c6e174b678702fc4b3c144f0117750473',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Failed\\FileFailedJobProvider.php' => 'bbf2d366571dbc69774f649f8978b272ec3ef643',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Failed\\NullFailedJobProvider.php' => '77b88552a8b373db4baf003b297101f1115942eb',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Failed\\PrunableFailedJobProvider.php' => '05bbb1b6fbb4d1a9a5905230f6421689405aa250',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\InteractsWithQueue.php' => '59be3fe2541170f150b3de5ab4094f8e22d0b50d',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\InvalidPayloadException.php' => '36ad94894766564a4f1051fc172d0ff869b4b6d6',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\BeanstalkdJob.php' => 'aa99a7417a54c3855d9128ee7a6143e198189e83',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\DatabaseJob.php' => 'fb748eb58e1774f6b3350cb574216f4af0e27570',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\DatabaseJobRecord.php' => 'af35d62f00a234aa57bb9f5d5aa5a4cff7c0d270',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\FakeJob.php' => 'aba859a6c655e105011a10514ea7719e06d2dea7',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php' => 'd1e88703abab470f1fed7f7e7d2586614f5ddeb5',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\JobName.php' => '14106458e6232d0fe4d5cc9e3c241a8bb0b9329a',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\RedisJob.php' => '95b2ba1aff6ddabf77eb941f716c77f6e9b249db',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\SqsJob.php' => 'b47b75e06a7c526dd9baa2f252aa792fdd621398',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\SyncJob.php' => '2b5a6b460e314820eaec26ffeaed242c7268f6c3',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Listener.php' => '2488358988a8d12b80b382711f5c53215c97c0b0',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\ListenerOptions.php' => 'be0b8efeb06e38906aa86bee11a1243232687efa',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\LuaScripts.php' => 'dfa4fc91328ba876fd2571559d868f29f9859d90',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\ManuallyFailedException.php' => '30e4ab75615d54f6510352e7a192df74d915fa16',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\MaxAttemptsExceededException.php' => '7fb72e5b7595843aab7f493b87b1595a8c3f54fb',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Middleware\\FailOnException.php' => '529cbc9324ff0577e3854ec16798654beef65485',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Middleware\\RateLimited.php' => '4ac7affe11bc2f82c415131c20da47c40e200187',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Middleware\\RateLimitedWithRedis.php' => 'cb823a22a97abe17b797d7c41dc895c79866ae57',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Middleware\\Skip.php' => 'b3f874650f3e37dba7c2f6c49347bec61c5b3572',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Middleware\\SkipIfBatchCancelled.php' => 'c3647cde35dce9110a56707adbf1da876b4092b7',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Middleware\\ThrottlesExceptions.php' => '84db4d7a552b00b486d984605b47b84573297d21',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Middleware\\ThrottlesExceptionsWithRedis.php' => '7e33e61c9132e73ee06dd0b18a6602c1e2c55050',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Middleware\\WithoutOverlapping.php' => 'be561b6a2592943fecc7963beb8337b56fd443a3',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\NullQueue.php' => '112755dbd9dea57c09fa044af40cc81b1e27a0ca',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Queue.php' => '6a4d88729afa984b2ad9fa3c5873b0a63eb04ab5',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\QueueManager.php' => '9c2d3788ef05e6c084490a0a626c8b8b63c87d4f',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\QueueServiceProvider.php' => '26a1d04bdfa904943e943c3d4892136cf639fbbe',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\RedisQueue.php' => '7c7c4219626689dbe519d3386b33282a8b28fd30',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\SerializesAndRestoresModelIdentifiers.php' => '19b865f8e7b14bd7f6133a9a5088665797825a7e',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\SerializesModels.php' => '0a68c4b44d869ed32a61b9920e60ef5780029792',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\SqsQueue.php' => '3fadf1517642492e5ee0958664eb6473a59e22c8',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\SyncQueue.php' => '52ae4712f3ad23e745919b8f05756d57076d4adc',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\TimeoutExceededException.php' => '2c576e1dbca85acea82b2b7bf6246a78604c21c9',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php' => 'd838edf8766f3b91db8f25a989ef41b94e018ab6',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\WorkerOptions.php' => 'e4bc0d95d1e3cc129fd8aeb92a3141d1cb8ca3db',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Redis\\Connections\\Connection.php' => '3ac020e55b687cc3ad447b6920084e4c95490e44',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Redis\\Connections\\PacksPhpRedisValues.php' => '0ccf8bb6e863a8cfb6dd6d04fd3578774ffaa10b',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Redis\\Connections\\PhpRedisClusterConnection.php' => 'a85b26260787dd11931c8be0e4e9834426e84d0b',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Redis\\Connections\\PhpRedisConnection.php' => '14f6f1a8542aaaf3850be5468ac5c41e1e0956c0',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Redis\\Connections\\PredisClusterConnection.php' => 'e1b20b95f2bddbfdcb4d2e688d2199189376de59',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Redis\\Connections\\PredisConnection.php' => '1ea017686b2222ae911a10b711348020b6e5d227',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Redis\\Connectors\\PhpRedisConnector.php' => '1c209ced510d87572a1d6f302fb28825124b8f16',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Redis\\Connectors\\PredisConnector.php' => '5edb6c9f0ab001e81ecfa0f3d603426aa50d22ed',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Redis\\Events\\CommandExecuted.php' => '7f0a5058bebc8fca3316f021febf28306d5e664e',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Redis\\Limiters\\ConcurrencyLimiter.php' => '01a682d571376db20b031a66e9da1a77e3255ef3',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Redis\\Limiters\\ConcurrencyLimiterBuilder.php' => 'd13a93210adf5f545f069276ca7bf7d8f8503a37',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Redis\\Limiters\\DurationLimiter.php' => '1f6e67a4a05d260c6cce5b84de737d88fa69fc1e',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Redis\\Limiters\\DurationLimiterBuilder.php' => '36b768f694a4dde60f433513f8c0d11e3aa7bbdb',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Redis\\RedisManager.php' => '49434480dfc9f5b99b429e5d50ebb30bed04c2e7',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Redis\\RedisServiceProvider.php' => 'bfd37b5ec423212fa171033d487f275ffffaa848',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\AbstractRouteCollection.php' => '866d68a7069d03f50b5f53342443fe26fa127fbb',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\CallableDispatcher.php' => 'a91246111c6a36a9731e22dcef7e3380abed92dd',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\CompiledRouteCollection.php' => '2d5d5dd34e3fb18fda1a8c59c43241d5c105bdbd',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Console\\ControllerMakeCommand.php' => '78fe9920a25c5bf6a2875077ad745644a17ed44f',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Console\\MiddlewareMakeCommand.php' => '6000037c68e89dda804b89d9e09ae39f31aef57f',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Contracts\\CallableDispatcher.php' => '066486f12e67022cc83b344d162402a17efe1b12',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Contracts\\ControllerDispatcher.php' => 'b987c91e94c7e689860dc9729725e940cad96a83',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Controller.php' => 'ab7cd675e0d616806bcd09208b505f8518880cca',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\ControllerDispatcher.php' => '0ae01c9665fed0ff616433e57313d091b13de35c',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\ControllerMiddlewareOptions.php' => '7534e2533108ada482b31ffa52d212930dac3480',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Controllers\\HasMiddleware.php' => '12627823b18d8584a398d304b5a22ac811c15dfd',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Controllers\\Middleware.php' => '3ace1ecc88a6b252e8376b2953f73dc35a3687a5',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\CreatesRegularExpressionRouteConstraints.php' => '1dba9ac4c5c3b0130b5b41e47a6f13aa8c9e2b86',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Events\\PreparingResponse.php' => '1e25e4acbff3161259b8de6f9ec445dacf92e4f4',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Events\\ResponsePrepared.php' => '4737038e4f28378398d0e247fb9a71ed43ce4a9a',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Events\\RouteMatched.php' => 'bd261f253b92308a468dfd8df6c103b6289db613',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Events\\Routing.php' => 'f320b20e3a8ef37bab06b594c737f85b33a1e370',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Exceptions\\BackedEnumCaseNotFoundException.php' => '437a72c7a1ee2558fa0d7a58ba8e81909e55ce12',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Exceptions\\InvalidSignatureException.php' => '4196a79e03389b8eb445167a81a689a214e3938b',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Exceptions\\MissingRateLimiterException.php' => 'adb597990fe3915efcb6cc1f7ffbe8e8cc921d55',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Exceptions\\StreamedResponseException.php' => '292c3b3cdb8cfa7f1ad4a19cd0b1aa91cecc1b1a',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Exceptions\\UrlGenerationException.php' => '0e1bd9c1829bd9fe72e6d4b6abfc60b791b6b7d4',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\FiltersControllerMiddleware.php' => '85442955e0067dc00992325c740cde2769ee0a5f',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\ImplicitRouteBinding.php' => '57ebdab20403832f4c8482f599b9b9d123fa7d15',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Matching\\HostValidator.php' => 'd25938bed8cfb88a37d950231f0744033b4e159c',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Matching\\MethodValidator.php' => 'e6829079f942a58fa2404efb3141b96aad97959d',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Matching\\SchemeValidator.php' => 'df028f87419f39b9fed9e7851d3c980a0606c6d1',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Matching\\UriValidator.php' => 'cea899c38bd0c1526118aa867499ccb42582f064',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Matching\\ValidatorInterface.php' => 'e7a6c5341f99ead8af60c48779e794be7c2c68b3',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\MiddlewareNameResolver.php' => '88310400d67a77e9fb710e756238f0c44a79e689',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Middleware\\SubstituteBindings.php' => 'f8aa101c170d7869d4beba5f0b97059f866335ed',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Middleware\\ThrottleRequests.php' => '5b332dfceb61bd01efc137e05545f80b678fd37f',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Middleware\\ThrottleRequestsWithRedis.php' => '92c3cd643e5bd9542d7b0d4dcc3386c6968786ca',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Middleware\\ValidateSignature.php' => 'ecc335e287a6e64462023a2f46d613a6b33674ad',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\PendingResourceRegistration.php' => '22ccf1e124982e290d873db7690f73ce376349c4',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\PendingSingletonResourceRegistration.php' => '6243d47da84db34edb19b304c29183e72139dbc0',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Pipeline.php' => 'e7d802e2b9176f044463f0ae836f6c70c5770c85',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\RedirectController.php' => '6d61d1c351d20d95b723e64d313851e332be845e',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Redirector.php' => 'fd9912de4ce7aadb77084c3ee982aea43f53300e',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\ResolvesRouteDependencies.php' => '97d4442f893b7d93ee4784a7264c7be70be83aac',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\ResourceRegistrar.php' => '63c0947555f6c9284cd90bfbb8b8e3490f0ba2cd',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\ResponseFactory.php' => 'e222f80da00b67c54ffc40c29ef71469f5f8354e',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Route.php' => '1008bbce278a45ad4b035d431d8f3f36b566a950',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\RouteAction.php' => '6b552c4efa1d9c2b85899c0deb11c056e695dd81',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\RouteBinding.php' => '07f1d1fba8885a8d952c78b8150e0a7a1904beb0',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\RouteCollection.php' => '4379775ffb80a25b54dad3821556062df9bf8ac7',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\RouteCollectionInterface.php' => '3d418076f7d6be4d3845774531e113f2654f5a56',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\RouteDependencyResolverTrait.php' => '77e140d33bd779bd91f6331444daf5e1c4098bb5',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\RouteFileRegistrar.php' => '0cd6fb57f94d0f60c71130ab2750170cb649df05',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\RouteGroup.php' => '9e048ac80b7b70111a12719f56c46d5082104d50',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\RouteParameterBinder.php' => '88e33075ece3eed5cfd1b2156beaabbad9feb64e',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\RouteRegistrar.php' => 'b5edc8153e82da07aee7271935646623793659d1',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\RouteSignatureParameters.php' => 'f6df190a1c58d2966978a0ec8fd256f496ec4fb4',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\RouteUri.php' => '1b8d8d6f96198b0028721e74d8fc5afb81ba2cad',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\RouteUrlGenerator.php' => '2bfce666a853738f9347bc9e9dc144ed90d87458',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php' => 'd7ce1b6dd973b9f268cb5f255a9be9a805d8c220',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\RoutingServiceProvider.php' => 'ed5e59f3809b87c01d896384114b30cc71a8ce62',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\SortedMiddleware.php' => '3942d1ab79e096ad4df6822a829807347bb1ee77',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\UrlGenerator.php' => '9ed93d21539ceee9a05d947bf34fa3dacad96e10',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\ViewController.php' => '284588f299e96be8354617e553ee3a9f08605b9b',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Session\\ArraySessionHandler.php' => '1acd20d2c96075febe1b413752a1132d4c6968cc',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Session\\CacheBasedSessionHandler.php' => '57fb70886d5ad13a483a9cac8a43ad41816a36f3',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Session\\Console\\SessionTableCommand.php' => 'a636da3e26f3a50dc7b99f9da51785e7e2cb0332',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Session\\CookieSessionHandler.php' => '5056c04af2285377f4126d08f5605e70ef933320',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Session\\DatabaseSessionHandler.php' => '3166a952c2daeb78a0ab59ce2ab7394e2f8e907e',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Session\\EncryptedStore.php' => '99a23b33a4057b9fb1f70ec355a7fbb5d8e1366f',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Session\\ExistenceAwareInterface.php' => '7d28f9505174d15cf4bd7518753d6b07ef2bd079',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Session\\FileSessionHandler.php' => '527b7214f164a7c27e639d542ece6c8bfb371c22',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Session\\Middleware\\AuthenticateSession.php' => '394b5a5453896b30c00cfcc4a650a128b4974049',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Session\\Middleware\\StartSession.php' => 'd0981c614451d03b5d1b46eefc0e1b9e07351aa0',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Session\\NullSessionHandler.php' => '16eb4dfcd0753365a13c3ec9ab8660ba9e4d6528',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Session\\SessionManager.php' => '9e76ea0befb961515b5888046a6166a6355ea218',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Session\\SessionServiceProvider.php' => '7477788221c65152be299d7ef9cd14dac21ef96b',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Session\\Store.php' => '56ee93281ac132e0ca59d4f6313b25d3e54b22ba',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Session\\SymfonySessionDecorator.php' => 'bc3db08bfa120a7afe464d85ea4bd10f6a3b918d',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Session\\TokenMismatchException.php' => '299b5c0c0e73e7be9c443beb4824fe5693a00c9f',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\AggregateServiceProvider.php' => 'ea406026c6c7df401c21f4c333a6e820c7079a2c',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Benchmark.php' => 'e8983445786450bdfde38c4494c6a8f89445be92',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Carbon.php' => '4edfd45f02ed57b140ddac39bc5f2f48dfb40493',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Composer.php' => 'd455b6eca8dfbf6609d7da1130f5f1463f2b9ed8',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\ConfigurationUrlParser.php' => '2ec04cd61ab47ee97463b1d72279e75158bf3bc7',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\DateFactory.php' => '2cd3188ec7f119b0a89ba3eed98289fb7c158462',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\DefaultProviders.php' => '46e9c1bee4a8a325d36aebb02f32f5b04d8b4dda',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Defer\\DeferredCallback.php' => 'e00916b9c8f48407f86f886261bf06da960847af',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Defer\\DeferredCallbackCollection.php' => 'ebb2ed1bd4c727e67f595dd3480e40dec5e08aa9',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\EncodedHtmlString.php' => 'd7addfefc1a497102ee78954fa78947d6491d311',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Env.php' => '7dae1099996e7617159685c63363125dd9ca7e8a',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Exceptions\\MathException.php' => 'c36f3b19849e508073169575548584060370fbde',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Facades\\App.php' => '62d361e566a6e14735ede6181e89596b1b4af528',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Facades\\Artisan.php' => '478a726c8b8c9a20f0d65a13644a1755a17a8657',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Facades\\Auth.php' => '53d0233195fd800ea5aba39b2fbc41792ebae07c',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Facades\\Blade.php' => '81ab889bbf59e8f76420e0c194b1ca0e510e444a',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Facades\\Broadcast.php' => '0a002c00129ca57016b3fa8e8a316ff455b89aea',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Facades\\Bus.php' => '9ee3a443752a8b792709ddb7acd37580999c3df7',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Facades\\Cache.php' => '397c8944394d7cbb2d637e43bcb845673a6395fe',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Facades\\Concurrency.php' => '79a4053c5709cff76028c2ccede1ad5c56e1a0a4',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Facades\\Config.php' => '7b15652797392c6368efc25a947ce303fea67a0a',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Facades\\Context.php' => '36c86c9f7002afde88f5ad7b441199434e17991d',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Facades\\Cookie.php' => 'f18eb5138b92fae032bd6481482026a7a2c928c5',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Facades\\Crypt.php' => 'f1f426600e6d2185d93007620343e737dc6a597b',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Facades\\DB.php' => '37b319d8592dd5f90b2a997b04bffe6c66558517',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Facades\\Date.php' => '6593ac1e86831ee742500629f1d9d376037b1461',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Facades\\Event.php' => 'a289338046c6e7649aab52aee39c8952529020ee',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Facades\\Exceptions.php' => '7819e908d57bcb7d29c0447d10ac4f0ed14827ea',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Facades\\Facade.php' => '7a7f93872fcafd964bc6ec30b6bf4df7246d0751',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Facades\\File.php' => '0b9f4cbbdb589495769d7292b0a2f34ebbae1770',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Facades\\Gate.php' => '39fd007c747c63b28617665220e852f3c5413d86',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Facades\\Hash.php' => '4a9fa22317b3decb9cbcef4f7409bca32fac42f2',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Facades\\Http.php' => '5092de80595a8cd9af4816c31444b90301a297bd',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Facades\\Lang.php' => 'dc05fc87cc056db542e0ef3f271fc9f33f5a9b14',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Facades\\Log.php' => 'da071dae45d2cce9de797effd8d7f95561f107fb',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Facades\\Mail.php' => '51750bf37c794ee1b2011cc684a8993b2b376e9e',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Facades\\MaintenanceMode.php' => '8a102bb869bf4b5985c2c88cea2bf84f469911da',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Facades\\Notification.php' => 'bd5d8923198820f0d6fb2d1486d370e280a2ba35',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Facades\\ParallelTesting.php' => 'e50e0c22922aed3b6aa5d0bdc86c113ac1cf3995',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Facades\\Password.php' => '4745ea22c3b94618e4264ad68bd6c624f5925355',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Facades\\Pipeline.php' => 'b3d12cb7366b96a1ac9fc531322b69466577891d',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Facades\\Process.php' => 'f8865be802f4266c36604e16fddb1e2619ff55e9',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Facades\\Queue.php' => '4cc78ff82455a769ac05833a68611344aa70f0ec',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Facades\\RateLimiter.php' => '4f83a5fda5bafd4d29f62f62c2d2f7834a113e0e',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Facades\\Redirect.php' => '317c183ca2735f0dea44307d8d3dabb7712f3e07',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Facades\\Redis.php' => '0f44cea54a12e74332577f80ace9ab3e1b2ebe8a',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Facades\\Request.php' => 'af3a6133028f039e5e7ce6a6f8d51ec094b781e8',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Facades\\Response.php' => '816581497ad453408a8aae41eedfd8261b959800',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Facades\\Route.php' => '07e2d8ded91848dd652005d8777792b0cd6213ef',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Facades\\Schedule.php' => '2857ca7b3b3ff6c9540740cd87edf0a12af7ba62',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Facades\\Schema.php' => '6c02ae11cff00c66ecb4c5dba87d6a0ca2644e54',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Facades\\Session.php' => 'c6940a8a9b4cb3502c6886c37323dadca1e9fdce',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Facades\\Storage.php' => '4e3616edee47ec4dc581e3917b5bf5a957dafb51',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Facades\\URL.php' => '897a3fdca6687834a06e4d000b46a485e2a3186e',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Facades\\Validator.php' => '002ca3871c4f753e6488c4a35fd2d2477cfbb088',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Facades\\View.php' => 'f4e4014239bded68eb6e74b67de8ba1aa62cf6f3',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Facades\\Vite.php' => '4988e598e0414da9cd2439a75168cab26a1975ac',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Fluent.php' => '9935f77378adfa29265440c708375b47359367d3',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\HigherOrderTapProxy.php' => '5ac99edf97482f7089329c70e8933bfbf02a99cf',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\HtmlString.php' => 'e02848643ca22c9b81d9e58a08ee201bcac90cfe',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\InteractsWithTime.php' => 'c9f3981e90bae82325297f6989d2a202ce453034',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Js.php' => 'c7baf1f5adce7ba73924723be961b6ce69601ea2',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Lottery.php' => '9faa21c8930d9b64423cb788bac2d3cb845dd8fc',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Manager.php' => '4db0daf7da503e802f983563cfd24ff72cef2cd0',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\MessageBag.php' => '7d4034772172b8fa672760ef074bbd6baf9acabe',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\MultipleInstanceManager.php' => '7dd7d3e7b00fbcd6d16e3d2017c92f19f3bfb8ca',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\NamespacedItemResolver.php' => 'aef570b2a4a92ef9b277ee250f094fc5439fff2e',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Number.php' => '4c45befe3c4c0719113fba2b1778ec785c1f6059',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Once.php' => '626f46bf836f2ee3375c89de95a92a611b0fb8e3',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Onceable.php' => '0440c402b8b3e7894479e0031f57b641cc6d3f46',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Optional.php' => '55f2ebfa6edaae5c0ef0863496e70e4936ed8427',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Pluralizer.php' => '4fcb0b55bc9cf8b34bfd32a4c5cfae8f9676bf62',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\ProcessUtils.php' => '0ec2efee9e46a0c691f8de197fc38bb3649d0e68',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Reflector.php' => '6e097a2e880a5b7c7ad02aeec90c9ba7c768b540',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\ServiceProvider.php' => '2eeeb04ad7133317e54b9660d1b11f16f24a462c',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Sleep.php' => '0a6950b165550f9dff1db6642a812035eb3e02f5',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Str.php' => 'fee503a507cffad2a9670f746d3cabb8dda4d370',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Stringable.php' => 'd369b0cc2b9db8ca76df1526e11ac5994c96f7b4',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Testing\\Fakes\\BatchFake.php' => 'ad08d490c6ca5d1b71aa2b53db8bb58bb8bc36ea',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Testing\\Fakes\\BatchRepositoryFake.php' => '8d40fad509dde24d1a601122e085c1c8b14a5b80',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Testing\\Fakes\\BusFake.php' => 'b75b3d2f8c7fe9c35db003a56efe30fa9de4e3f7',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Testing\\Fakes\\ChainedBatchTruthTest.php' => '72c0ee2897a57fa2dbbe518c7a4bb09e5e3200e3',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Testing\\Fakes\\EventFake.php' => 'cc6ce3ee6ad6e5b893158e2fb2372ef76f5fb2f9',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Testing\\Fakes\\ExceptionHandlerFake.php' => 'ccbf47350a49408af2e5fa2b962959c67a4fb7bd',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Testing\\Fakes\\Fake.php' => '066e923f5b22bfde438cac2f0ab0207649f64492',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Testing\\Fakes\\MailFake.php' => '249a325b0441a5dd78447c7760793cc905bb86d5',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Testing\\Fakes\\NotificationFake.php' => '8bd18ff9c60d12ccf7b604ff43bc5566988b3ed7',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Testing\\Fakes\\PendingBatchFake.php' => 'de75a014146b84e15e5f6cfd88b6e2a741561d02',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Testing\\Fakes\\PendingChainFake.php' => 'e45f5ee762e207aa6a2c39f3b284e667a3f74627',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Testing\\Fakes\\PendingMailFake.php' => '32f4e298e31a8d117769492f1ef31dab2931f512',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Testing\\Fakes\\QueueFake.php' => 'c2f2e94e6d232390eaf5eaa6159f5be95c62550c',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Timebox.php' => '9f3410bd128ff9a59da558a354458c7c612756c4',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Traits\\CapsuleManagerTrait.php' => 'b8a0f16d042dfa48e9096a70b66563cf428bc6c9',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Traits\\Dumpable.php' => '11b2e4720bc77fd1959f709a3328125db12a8f0a',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Traits\\ForwardsCalls.php' => 'b4627a4e84aa8043d9c1ce895a7dc4dfbd8c0b25',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Traits\\InteractsWithData.php' => '3b522e2c1113851c402d41ac22dec9fa63a0eaa2',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Traits\\Localizable.php' => '5ea496eecdb9bf803ccb21d3fa2264f10303a638',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Traits\\ReflectsClosures.php' => '677b7b061e269a5353654ff95e527694366d0104',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Traits\\Tappable.php' => 'c8f52976beb7b632e9f4ed864381d814a7ee5d6d',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Uri.php' => 'a7397cbc030e706198095be8ba3f6ea70b21f774',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\UriQueryString.php' => '54ead380be1b6fbc29226152f0d8b967d493d68f',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\ValidatedInput.php' => '6ce938b184f506b26e38c5f48f4b0f5cf4671fd3',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\ViewErrorBag.php' => 'a0f6d3f6a13b8072bcf9912af64e2d49504602d0',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\functions.php' => 'c9c740acffbdd448976c162b2f069f3af70a4d5e',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\helpers.php' => 'f202a5ae0c72ea5cc0689b3795c8f19cee9ed4b3',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Testing\\Assert.php' => '37ae8c2808c7bb44a2869917ce78fcce7a7c09d0',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Testing\\AssertableJsonString.php' => '4abae55c804a65e1d537cbb2f9526ed0f3268b97',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Testing\\Concerns\\AssertsStatusCodes.php' => 'c7f375599696eb0865c1aebe02c0f04206ecdbc9',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Testing\\Concerns\\RunsInParallel.php' => 'cd340cd2e82779a6cc0be701437843e344fc5fc9',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Testing\\Concerns\\TestDatabases.php' => '131cb9bfdc39752c24c8e0e169edfc4ced51d027',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Testing\\Constraints\\ArraySubset.php' => '9421e4eced24e43be34cfdaf8b720ab156397ba5',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Testing\\Constraints\\CountInDatabase.php' => '1f811f8b2fadea041eedea77544dc173731a9ba5',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Testing\\Constraints\\HasInDatabase.php' => '1a432d63719c24484fe6fd32e605ab4aa13f8aee',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Testing\\Constraints\\NotSoftDeletedInDatabase.php' => '2a92d8d2017aa77b87983de38a2ccc584cf963bb',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Testing\\Constraints\\SeeInOrder.php' => '1bc210417218adee04131b165ecb93d9b95ee1a8',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Testing\\Constraints\\SoftDeletedInDatabase.php' => '8bd459c9e0b168f3738b36d397d0b1a9b17146cd',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Testing\\Exceptions\\InvalidArgumentException.php' => 'cfe881254bd21ba6f6059346a0893c32e3cdc326',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Testing\\Fluent\\AssertableJson.php' => 'a5d3a6c0d7e0c9aa896c7b204aec1afda80e80c9',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Testing\\Fluent\\Concerns\\Debugging.php' => '41c884477296c711ad3bd2bbc56c01185c28f44f',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Testing\\Fluent\\Concerns\\Has.php' => '40f6fc2ed307990ee20ebbecbe03316c2daa3676',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Testing\\Fluent\\Concerns\\Interaction.php' => '20708a2b3725cd822816cbe284c009ba4af693eb',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Testing\\Fluent\\Concerns\\Matching.php' => '318ece90c6183131ffaec03bdc926b5e2f131973',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Testing\\LoggedExceptionCollection.php' => '9e9b58120f996626fdf1ac89c96ccc710e4e2d3e',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Testing\\ParallelConsoleOutput.php' => '62b59d34c7dc19ef730b72a0c466d77eeb82b307',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Testing\\ParallelRunner.php' => '821fcfc622917fd44dd9b1e685e0c38ac50a9fdd',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Testing\\ParallelTesting.php' => '3aa46d7b23ce59bb3d61d48fcd328751ee158a29',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Testing\\ParallelTestingServiceProvider.php' => '24fba126e3be64a47e11e4178a2c32ac2593beec',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Testing\\PendingCommand.php' => 'f49cded7390928b1f0f9150f5c9e0c6494ed8c4b',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Testing\\TestComponent.php' => '473fa61ad23dd56765594725f62cc8a831a10e15',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Testing\\TestResponse.php' => '14e0accaf96431d719658c33cad8902194ac13e9',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Testing\\TestResponseAssert.php' => '6aa53ba4a1d897f72cd2dc6cd1817039ad2e5933',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Testing\\TestView.php' => '427ceb004b9b254935ea1aeed1701660a7d1ad96',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Translation\\ArrayLoader.php' => '4f2dadf9ff23788f7da8e59df5efca26431095a9',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Translation\\CreatesPotentiallyTranslatedStrings.php' => 'cc97976d2855b40c767e629a4f18edf63c4cde66',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Translation\\FileLoader.php' => 'f94b4041715c922519516ff0402b9ed355272c08',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Translation\\MessageSelector.php' => 'a44cb2b4cd2aae372222056e57e545e1c139385a',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Translation\\PotentiallyTranslatedString.php' => 'a88733da1d25bd58e10b8517522324603683b3b3',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Translation\\TranslationServiceProvider.php' => '746e2bae094ff73ce50f5bb8966a11178ace9193',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Translation\\Translator.php' => 'af655fe927fcc85a467ebc7fe95c9687657f1929',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Translation\\lang\\en\\auth.php' => '74aaefabd520f494dad99a933717ff0dd122a385',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Translation\\lang\\en\\pagination.php' => 'a8ac7322e9b9a5d4b70c95b0e55df0f51411e337',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Translation\\lang\\en\\passwords.php' => '08a2526e2d56abae8bf682923e848bb2e48b5007',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Translation\\lang\\en\\validation.php' => 'b5bddb4528f3903a0b32fa756dad9c39738d2922',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Validation\\ClosureValidationRule.php' => '4c877e7d8050b9bdf30ba2b0525b8bf115fbc8c5',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Validation\\Concerns\\FilterEmailValidation.php' => '1aded573d930dd0c402a9e5515375114f9551559',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Validation\\Concerns\\FormatsMessages.php' => '0e0f4cf465237156734cde423a2aa3f3a1560976',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Validation\\Concerns\\ReplacesAttributes.php' => '5279ca72cfcd6441ebc0c007f0586953bea0d274',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Validation\\Concerns\\ValidatesAttributes.php' => 'e95fa974dc8292e8c1bb8e59b03ccfadb1ee1534',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Validation\\ConditionalRules.php' => '3e2b1d9f64c86e17c0736cd3ef3a0f6064a59b57',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Validation\\DatabasePresenceVerifier.php' => '3117d1d688ea44bcb7d7c741229f0a82afb711de',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Validation\\DatabasePresenceVerifierInterface.php' => '03348f8a1d38d5b08c032b092cbb4369a8b568fd',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Validation\\Factory.php' => '339024cad1c14f74be3c03724b4c7666f86e856d',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Validation\\InvokableValidationRule.php' => '9bc72070a9b86135c34f9b056699b512bded2f34',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Validation\\NestedRules.php' => '25e7fac841cb1bd7c1a40301cb0cc26e9831ccca',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Validation\\NotPwnedVerifier.php' => '33d27ef49193d79c2d6f973caf998cb599fa0f52',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Validation\\PresenceVerifierInterface.php' => 'dd021a2b55e0f8a904a7df50bbad9707cd723a30',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Validation\\Rule.php' => '5b4baeab86594ab96eb43dc80b0848503956519e',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Validation\\Rules\\AnyOf.php' => 'd67166e6faf8e2f064bbcf62c121c1d7022dee8f',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Validation\\Rules\\ArrayRule.php' => '2cde0926b645e129db41e30600f4ad12b4883372',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Validation\\Rules\\Can.php' => 'b54ca18a8fbd2c265ef56111d534cf924876d596',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Validation\\Rules\\Contains.php' => '7bee9f762dae631ffee10e14b0246029e0cba5ab',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Validation\\Rules\\DatabaseRule.php' => '59d01ede5463da236d32d9446e4c0e7a4d165d74',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Validation\\Rules\\Date.php' => '17adaa0ddcd9b2a5dc7b2b40a224334b55368765',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Validation\\Rules\\Dimensions.php' => 'a7934e4228d7771ea23bdc878f2fb33b1e0fb359',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Validation\\Rules\\DoesntContain.php' => 'e0dbbe7172799a87b7f2afc68bbef477bd79375c',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Validation\\Rules\\Email.php' => '65b0f83ceca07cfe4217fb00581a14b242a8c61a',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Validation\\Rules\\Enum.php' => '13675c09bc9c7d7b4faef3c69667868b089792ec',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Validation\\Rules\\ExcludeIf.php' => 'be016428a441adaf776d65515ec7bcb12a869793',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Validation\\Rules\\Exists.php' => 'f6cd772b0bde80dd6d5b1be75cac7c35c17e35dd',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Validation\\Rules\\File.php' => '808dfdd42844eeb6d03643511f8d72c0fd54c549',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Validation\\Rules\\ImageFile.php' => '9cc0c1dadea05beec79a696aaabdfdd21f21debc',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Validation\\Rules\\In.php' => '2c6e14f3968d6afad77e721b9476693bd9fd730c',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Validation\\Rules\\NotIn.php' => '89e83d8631567dfa88d10d92f10bda1988ad929d',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Validation\\Rules\\Numeric.php' => 'ee36973a30ecaaa58b6970f221c794750b055cac',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Validation\\Rules\\Password.php' => 'd4ca8f489f3b61d80f37bd4bb3e41f7424c20953',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Validation\\Rules\\ProhibitedIf.php' => '30eece55ddd097817474dea5917dbc50bfd13910',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Validation\\Rules\\RequiredIf.php' => 'f3d667276ef9ed6ae4edd048cd5247e609d25594',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Validation\\Rules\\Unique.php' => '355da9467efb7a96d116ac99f2339955e233b5d2',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Validation\\UnauthorizedException.php' => '35b394dc9b524be32b84c5a4abf421e2d179321c',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Validation\\ValidatesWhenResolvedTrait.php' => '310a3551f19dd91adad6d04d6cdcd2ff302f5639',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Validation\\ValidationData.php' => '353951c3fbd9af35d78d43af1e2db7248fd0955d',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Validation\\ValidationException.php' => '332201fe966dd511f8ea9134c3f0a26f5aa18f75',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Validation\\ValidationRuleParser.php' => '0fb0086115f945a27aa5a1573740aeeea9dd3e32',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Validation\\ValidationServiceProvider.php' => '0ea73d68257871f820451a3e8f48d04a73671569',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\Validation\\Validator.php' => 'e479e68a2748cb61e76cf9125107afb36b5c8edb',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\View\\AnonymousComponent.php' => '9f08da0ee227cf1d500b1b202b1be488ddfdff3e',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\View\\AppendableAttributeValue.php' => '88a067a638883e31d6a0dac5cdfaa556f3332792',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\View\\Compilers\\BladeCompiler.php' => 'ec3eedda88a499e0e113f24d6106cd780bf5cf4d',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\View\\Compilers\\Compiler.php' => '065917c3f2b1dffa295cc191ac240a28b540df77',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\View\\Compilers\\CompilerInterface.php' => 'd6d84508df4ffd0b356d8bc418b1452ee08316ce',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\View\\Compilers\\ComponentTagCompiler.php' => 'b8f1a5e5b121688b9c41d9ea4ee44848f65da057',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\View\\Compilers\\Concerns\\CompilesAuthorizations.php' => '6a823eaa7964332e7c702f4b9a12ab5238652175',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\View\\Compilers\\Concerns\\CompilesClasses.php' => '2fa33b1d32c25747c0e1770de8753ce6caf8adf0',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\View\\Compilers\\Concerns\\CompilesComments.php' => 'b0c328ca552b56b512a5eb6482a7a469dd70a51a',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\View\\Compilers\\Concerns\\CompilesComponents.php' => '66e8d87408e23ab9e8917e92f388f037e826564d',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\View\\Compilers\\Concerns\\CompilesConditionals.php' => 'dbcadee5c3844f11bcab33440cbd82ddad466bdc',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\View\\Compilers\\Concerns\\CompilesContexts.php' => '31612a27da3382063524023a26c34e9fec109ed1',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\View\\Compilers\\Concerns\\CompilesEchos.php' => 'b692f7fdbfb62bfc6758904414c0f8dfaec1d727',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\View\\Compilers\\Concerns\\CompilesErrors.php' => '3ee8c1ff20027d06862a98463545ca7290c9d94c',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\View\\Compilers\\Concerns\\CompilesFragments.php' => 'da1d3c6d6e7fd9db2c0932c38c19bfa5fdc0dd6b',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\View\\Compilers\\Concerns\\CompilesHelpers.php' => '8b5c335f3e5b9bdb2e61a0839eecb560e4ab52e4',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\View\\Compilers\\Concerns\\CompilesIncludes.php' => '86bd06d5c1772570da71a073e67d9e9d09e4f7dc',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\View\\Compilers\\Concerns\\CompilesInjections.php' => '6ff94dd2f7fc225d5424b792fffe8e88c7e37acb',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\View\\Compilers\\Concerns\\CompilesJs.php' => 'bbab0d64c24b93c2bdb4b2c47647af8b25fb39ce',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\View\\Compilers\\Concerns\\CompilesJson.php' => '95594aa60901167a7a51651900f320318dce834e',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\View\\Compilers\\Concerns\\CompilesLayouts.php' => '0727045f3ac5db9b534f3ece40ad8feb05c9644b',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\View\\Compilers\\Concerns\\CompilesLoops.php' => '410337780408c7363c763760681d4ee4366e4a7c',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\View\\Compilers\\Concerns\\CompilesRawPhp.php' => '422c87ccfde6887a8e9ff41638d42ea78a7d3d73',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\View\\Compilers\\Concerns\\CompilesSessions.php' => 'a5963efc5368ade18bb6e1752a1f3c45c93e5ff8',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\View\\Compilers\\Concerns\\CompilesStacks.php' => 'a73d80826f14dd50d4afee185733e2000c16e3fe',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\View\\Compilers\\Concerns\\CompilesStyles.php' => 'f6a1ee5b4a6bbc14834deb7f63c36bf91ff9e3af',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\View\\Compilers\\Concerns\\CompilesTranslations.php' => '899aa98858be2c9749a28cad087a6792c79c4661',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\View\\Compilers\\Concerns\\CompilesUseStatements.php' => '387482c947895741b7930484a8224ada57ca30bb',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\View\\Component.php' => 'ff6dc5bf130c697a3420e1110c3ca5171522f66c',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\View\\ComponentAttributeBag.php' => '5d20fabe95c6cd43d040d002ba523363fc613fa2',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\View\\ComponentSlot.php' => 'e9489d7c9165171353be3477ce4a8d2f7407670a',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\View\\Concerns\\ManagesComponents.php' => '6a5bca88f7012d6a6ed3aa1ae2d7029b2fc2f393',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\View\\Concerns\\ManagesEvents.php' => 'fd4dfa670d0824bcfd56bda11615515ecb843bba',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\View\\Concerns\\ManagesFragments.php' => '984c3549c5fc6094305b122c4b7f727abcbd8f72',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\View\\Concerns\\ManagesLayouts.php' => '79a06de3f55ce7d8a5cb60eb729fb2cada17057e',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\View\\Concerns\\ManagesLoops.php' => 'd1c9680c42882b7489be72b7e36011f312501a33',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\View\\Concerns\\ManagesStacks.php' => '110dd6e3434e3e70a1804b3688afb1032f3c25ee',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\View\\Concerns\\ManagesTranslations.php' => 'b04fd6ee30eb605b4fa2e435de291f8f8022ff06',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\View\\DynamicComponent.php' => 'e4deaf85721c1e947d1f6f57fddef2a6212da5f4',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\View\\Engines\\CompilerEngine.php' => '10d567ed0298a8a40152ebf8678817e2926f0a75',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\View\\Engines\\Engine.php' => '43bd9ee7c22ec03afaf85ef6ce9542f17d6642df',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\View\\Engines\\EngineResolver.php' => '7df3f594f4b456776b0feef39971485dd5dcc5cb',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\View\\Engines\\FileEngine.php' => 'fc00ba4be4b80fa2c480b3583e8c4e68b743d8ee',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\View\\Engines\\PhpEngine.php' => '905f9d13151c255a4375612d6860823aa1dacdda',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\View\\Factory.php' => 'c2a17b52b0cd990b379a60291a4c544efc8bc302',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\View\\FileViewFinder.php' => '28e882f435a2a75cec66f32e09715f573694be96',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\View\\InvokableComponentVariable.php' => '650df74139d0d2d86a53b991711570525ac2a8b7',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\View\\Middleware\\ShareErrorsFromSession.php' => '5d0d967ef71f0da9176ba79cd811974682aa1bfc',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\View\\View.php' => 'bacedec7c88be5cd969efb14d1df929f61d94e1a',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\View\\ViewException.php' => '8401362678a1d832b15de04d3b26ddf86b6ebe17',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\View\\ViewFinderInterface.php' => '4351676b8418b90a88f78e06254df9d5c984b091',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\View\\ViewName.php' => 'eb86574d87bedc10a4261c0128544413951c70e1',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\laravel\\framework\\src\\Illuminate\\View\\ViewServiceProvider.php' => '2bd6749115ef0456a903f068ee6b6b492e383f7f',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\Cache\\BatchCache.php' => '095becf4b13bb0e66e74535be9e7b204fa1fa26f',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\Cache\\BatchCacheDeprecated.php' => 'e5f5c7affa3ab310dd2b0a11c869ddef5e2c8da6',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\Cache\\CacheManager.php' => '7a9343c5accc515d4334b4b53e861e40ff07e545',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\Cache\\MemoryCache.php' => '7b87d024d6d3ceb30e3766f4ea043f7b78937a1c',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\Cache\\MemoryCacheDeprecated.php' => '6a9664f34efb048d760743e5c4fb3e6904155160',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\Cell.php' => '7f97ee07b6b75bd3ba0fca9940953472fb218016',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\ChunkReader.php' => 'bad687081b224af6d9ce6631a04fe372acf2d971',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\Concerns\\Exportable.php' => 'c9e7840d456c724bdfd2600220d349ed2460edce',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\Concerns\\FromArray.php' => '7e970e55b15a390a03db1fd0c9e1ed12d87b19df',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\Concerns\\FromCollection.php' => '37a427e74500d2b074cb72bf4945784f9d8c8445',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\Concerns\\FromGenerator.php' => '8ce13ddc63dc233e97b845f582ede6225e31b7af',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\Concerns\\FromIterator.php' => 'abd66cfa2f80fcbd3c2a72aed3b9f7dfebecd06b',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\Concerns\\FromQuery.php' => '023672403ad3174b9d3cd964359e808cd45743d2',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\Concerns\\FromView.php' => '5b97b7c63f2e7c7c7b46995322216f3b3f998b2a',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\Concerns\\HasReferencesToOtherSheets.php' => '0efa35ded76e1e201a3f62a7dca641f06a345454',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\Concerns\\Importable.php' => '2750f65871ed058a4f6d4df994d49683144ba2fa',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\Concerns\\MapsCsvSettings.php' => '6d7b8cb9629ce3e4de70bbb9528e1dce8bf76ade',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\Concerns\\OnEachRow.php' => '3ed7f4b0780c2f9d10e62b919f1b5d319d92fa5f',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\Concerns\\PersistRelations.php' => 'bf17d123c058f5d4aa8568fdfe64ac566868a2cb',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\Concerns\\RegistersEventListeners.php' => '019ae739ca7831843f3ba6ec1d3ec360e1d09619',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\Concerns\\RemembersChunkOffset.php' => 'cf083b49e79dda3dbc253a5605fff9de03a12bfb',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\Concerns\\RemembersRowNumber.php' => 'f25e77750b762fbf0d3a4f5cfe8d4465563f7c3f',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\Concerns\\ShouldAutoSize.php' => 'd0f41f83bba16cf0d73a573dcd930fdfdab9f6c5',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\Concerns\\ShouldQueueWithoutChain.php' => '5de4d61cfbdc754dc9fcaebe22f2be6d5f5ef3ce',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\Concerns\\SkipsEmptyRows.php' => '4375bcdb204a3fd7d92226dabe94377941c2eeee',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\Concerns\\SkipsErrors.php' => 'cf6f64eb473cf66d12354605f789d47b0b1818b6',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\Concerns\\SkipsFailures.php' => 'eeed4744cc66f0c78ffb5f744283cd3292fa7daf',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\Concerns\\SkipsOnError.php' => '26357dfa642288339132a50dfebb29184f92a1be',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\Concerns\\SkipsOnFailure.php' => '3486c2970dc656aae5d28e05ac998e5ecfd893af',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\Concerns\\SkipsUnknownSheets.php' => 'f78be4f08ffdb4bb64b9c355c76d86b681fdee59',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\Concerns\\ToArray.php' => '56735262debe9da5060f14834bef11e2b9519bbf',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\Concerns\\ToCollection.php' => '4d2ecc76adca5ee36108988b88ebbe4e4490a3a0',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\Concerns\\ToModel.php' => '15db69eb6389e8ca3d5799a66f19b8c724c93df5',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\Concerns\\WithBackgroundColor.php' => '6094f61c0c687ba2079b9ab21b39367d8a6f6f4e',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\Concerns\\WithBatchInserts.php' => 'ef585922040b2d53da5a94e4b6120fc08681a36d',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\Concerns\\WithCalculatedFormulas.php' => '85d16b760b06fc6f6adf416ab98f65498eab6538',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\Concerns\\WithCharts.php' => 'b7e2402ff8589d99b6ae74096fb4ac2e47ff037e',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\Concerns\\WithChunkReading.php' => '2c9e0c964c762f4e21caca2a5bca4fa6c682b88b',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\Concerns\\WithColumnFormatting.php' => 'e5dfc50150aa560c8cd31eb3989e458dcfbfad7c',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\Concerns\\WithColumnLimit.php' => 'fd7327673537ae14c0f16612a856c70e184e26f6',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\Concerns\\WithColumnWidths.php' => 'a47cf9cd76272775dc6568917e279f524d293ffa',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\Concerns\\WithConditionalSheets.php' => 'b83c0d4e791dd7334c494b49275de335fc8e3c16',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\Concerns\\WithCustomChunkSize.php' => 'd2880e6cb9dd33155ff3df6ab111fc26e5fa6355',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\Concerns\\WithCustomCsvSettings.php' => '15c2c11694f731d33c5db179d2ae03f20371f7bc',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\Concerns\\WithCustomQuerySize.php' => '0cc1f9204276fde29b1e497c2e3b58d83acf352a',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\Concerns\\WithCustomStartCell.php' => 'd323c6a723e019dc144f3b62a4c02503779dc77f',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\Concerns\\WithCustomValueBinder.php' => 'a33980a18dd2262ef6647d912c600c1ee7cbb565',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\Concerns\\WithDefaultStyles.php' => 'd7ae4a44be5c41346221c702dac4fa708926f1e0',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\Concerns\\WithDrawings.php' => '91b37536fa3778e42d7324aeefed2f8beb992940',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\Concerns\\WithEvents.php' => 'e08202d66b7b3558e5392ace0fce7ea12b492e63',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\Concerns\\WithFormatData.php' => 'e9d4737ab7e776dcdcba2ccffcfac13054170221',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\Concerns\\WithGroupedHeadingRow.php' => 'edffe074be542b2d5cff46de88700b51f9b674cb',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\Concerns\\WithHeadingRow.php' => '28e989d3801576e23901029a2d3f2d76ecde4e97',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\Concerns\\WithHeadings.php' => 'df5442664d36797a75feec7f273a23259cffa5d5',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\Concerns\\WithLimit.php' => '6f8f1563d91007d5dc622c8b8e7142a78f074e2b',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\Concerns\\WithMappedCells.php' => 'a09215f9263e1068ecec86d1ca55f09a6373b3e7',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\Concerns\\WithMapping.php' => 'f56e8017c872e7865e07af88f4ee0e5da7325202',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\Concerns\\WithMultipleSheets.php' => 'e66711c1b95451580484ef6000030c39eae71aec',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\Concerns\\WithPreCalculateFormulas.php' => '577b06da643cf82268d32f4b2857c0c30b80f315',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\Concerns\\WithProgressBar.php' => 'f17fe165a1915996981b36e822cc4861874a1789',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\Concerns\\WithProperties.php' => 'c09fef5d0a5c62d53abd0abda0f6bbc964238551',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\Concerns\\WithReadFilter.php' => 'cd49f543bfd6f56840f58e24eccaedff719a4b75',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\Concerns\\WithSkipDuplicates.php' => '1d98b36dd7ddc9ebf8b9c6d27b062f439b8ab847',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\Concerns\\WithStartRow.php' => '0696ed4e19a8b115ff6276863803fbb708963bd8',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\Concerns\\WithStrictNullComparison.php' => 'be5078a144c9808254c76b0214a56221ff8f442a',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\Concerns\\WithStyles.php' => '01241cbeff8f3dfdde2e14ee4facaa730de313d4',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\Concerns\\WithTitle.php' => '431f16a191f2597697d833bcaad2e7789fb24922',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\Concerns\\WithUpsertColumns.php' => '79d0786ce21734d7e4cdc1430bab0effc15ffa7d',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\Concerns\\WithUpserts.php' => '6dc31b87eb0a69c0ed878f9973728e9a6a2bd001',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\Concerns\\WithValidation.php' => 'b0b7e46bb6371f33632bca10216ec934662d77d3',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\Console\\ExportMakeCommand.php' => 'f8eefeea02a249c54bfd2f44563158b4e61733b3',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\Console\\ImportMakeCommand.php' => '48c77b4eea0ba72209ca2056696d5bbc12a40fa8',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\Console\\WithModelStub.php' => '57382dbab5b26c97ba2b006256d3752da1d684c3',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\DefaultValueBinder.php' => '292f03b4ee2893dba34ba47d77102482bf77f420',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\DelegatedMacroable.php' => 'd1d080bbab8ff59c1dec11eb82b575898e733d66',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\Events\\AfterBatch.php' => 'feb41d75cc450ff2634694ddd4e9ffe6d5e27576',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\Events\\AfterChunk.php' => '6db219d62b8311a2fe609881fafb4fce3b91fa25',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\Events\\AfterImport.php' => 'e1facfbdfa911f0637b1fc8338ed27b65db9b391',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\Events\\AfterSheet.php' => '9ac0f24eb34b494083ac9a146133f17adc3948be',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\Events\\BeforeExport.php' => 'ff34be6587a42aa0b7e4c40fd1a251b7df10d7f4',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\Events\\BeforeImport.php' => 'a686ef5f4095f12c6804eb89a1a301d52d96a504',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\Events\\BeforeSheet.php' => 'f29c6cbfe037ccfd264bad1f87fe8b8844b45b40',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\Events\\BeforeWriting.php' => '5c476de61158c3afd8c1909d979d30e4dd0c208c',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\Events\\Event.php' => 'ab2e35587a93fdae4a674eaaaa7551085a3177a3',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\Events\\ImportFailed.php' => '60eb59421e2938fbe2e13357a94f05981d3a1818',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\Excel.php' => 'c7ec0286b297e058e00ea513e105af20018db515',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\ExcelServiceProvider.php' => 'd876442a63501b691f4b4ff0e4e3f237c529ff5e',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\Exceptions\\ConcernConflictException.php' => '65fc7bfb67e2a1ea648bfdf3b369a019b91c3643',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\Exceptions\\LaravelExcelException.php' => '548f1da30abbf2482841f5c6e0ce61a149853b41',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\Exceptions\\NoFilePathGivenException.php' => '0a85386a60a610a8cbb95b5570d7f4e3e87cb2dc',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\Exceptions\\NoFilenameGivenException.php' => '36a05f0b06695b596f3648ace650467664d1827b',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\Exceptions\\NoSheetsFoundException.php' => 'b2a78dd3a49d291e52065ca2ee399aa41094e657',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\Exceptions\\NoTypeDetectedException.php' => 'e3d3d9d452e045227e91c1ee1be61f476844f49a',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\Exceptions\\RowSkippedException.php' => '5c71fa69c23503beeb30361f67d077fb18000e0d',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\Exceptions\\SheetNotFoundException.php' => '77a16f253b663bffa70c3e2db9c63ac4d624795e',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\Exceptions\\UnreadableFileException.php' => '5768ccdf997f115ca2a03d71cdffe2178ac80c8c',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\Exporter.php' => '1617fb15ab1e7ce231c29321350b746a142f07c0',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\Facades\\Excel.php' => 'ee7e042f766daa62121ccb33ecc94d1c02ba6a26',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\Factories\\ReaderFactory.php' => 'c7d6293e3d4d463d8d846fef04ff1b5eb1cafda4',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\Factories\\WriterFactory.php' => '7d4a2e88d9095484edbed247a5e3b29b6838eb50',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\Fakes\\ExcelFake.php' => '4c62997cc3ba382b0359bbf74e45e0449d91767c',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\Files\\Disk.php' => '0fe6f85a5c568bc536f808a9c98da71b9e345cd6',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\Files\\Filesystem.php' => '77df133053654be2b8e97ae8ce6f046fcfc7e134',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\Files\\LocalTemporaryFile.php' => '01f363507cf4543512410b329fa9a970ba8d6fb3',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\Files\\RemoteTemporaryFile.php' => 'cc2b392f2eeb90a4f167d0ab10d3ef32ea19e952',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\Files\\TemporaryFile.php' => '2575068e6eee377d48be783b9a09d827e7f0a7f3',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\Files\\TemporaryFileFactory.php' => '69105edad64209e53785010bf37c183b99e00147',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\Filters\\ChunkReadFilter.php' => 'a7fabc25336cf2a6d88bfe744252bff8a999b51c',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\Filters\\LimitFilter.php' => 'cde21bface91f508ee9f39da642ef33a9b6bb6a4',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\HasEventBus.php' => '39694f0bd5941fd3bbc67bca093eae9e232ec3ed',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\HeadingRowImport.php' => 'fa1cf86862e52b263580982322a324b1c74aa94d',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\Helpers\\ArrayHelper.php' => '6c42d7f04652dd389ed5a3a725c2563e3e5066cb',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\Helpers\\CellHelper.php' => '42eef3c5adc78e94f46fb97cbe34100391ede149',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\Helpers\\FileTypeDetector.php' => '133f4b40e4b263e812111148331cc588eb80e71a',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\Importer.php' => '135bbfc970f8831b4daa1ce5002929a31e09fc06',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\Imports\\EndRowFinder.php' => 'ac3aac4e7b654434ba7638e4f6e072ecefbea06b',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\Imports\\HeadingRowExtractor.php' => '8b00ea86ae82ff109bfac5bf934c2481436dcd38',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\Imports\\HeadingRowFormatter.php' => 'c27a9e9379c908cc1c5f04aef675377cf6863d59',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\Imports\\ModelImporter.php' => '511c1cb22808f4d98a23b26ac16bfcae6065e606',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\Imports\\ModelManager.php' => '9c1eda08fa2f53c2fde7d28a2dcfa9f68fb6692c',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\Imports\\Persistence\\CascadePersistManager.php' => '857f3019e37293424094d6f283ba50ef7dc39f5f',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\Jobs\\AfterImportJob.php' => 'c5c39d01daa6ec4f743b70a9711e85c968ac80fd',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\Jobs\\AppendDataToSheet.php' => '57905cc7249f425ec0a7a268b629cb2c2e42eb59',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\Jobs\\AppendPaginatedToSheet.php' => '818f73188afcc2e65fb90d48d657e99237762357',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\Jobs\\AppendQueryToSheet.php' => '743fce8f5671cb081c4b828d45cc456dca4c14c2',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\Jobs\\AppendViewToSheet.php' => '641226725776d656b2a4426a5165377c9e2e39b8',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\Jobs\\CloseSheet.php' => 'd4fafd7041e1dc423bea08686eda387fd3b4d95c',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\Jobs\\ExtendedQueueable.php' => '0e641f5e65744547684928cec5d19e2488786605',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\Jobs\\Middleware\\LocalizeJob.php' => '6bac4040cf809315f8e8fa2cdca66c03c9d0e32e',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\Jobs\\ProxyFailures.php' => 'b2886980f40faa00a525c32b7741124c83858189',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\Jobs\\QueueExport.php' => '32d3d5917ea5a01ba754e456f14995d94b3204bb',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\Jobs\\QueueImport.php' => '00f4db1a5602da7a15247c3ff5dc9104176018c8',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\Jobs\\ReadChunk.php' => '214c695c3e83ea1fba0004c9e9aeefc94de1dd47',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\Jobs\\StoreQueuedExport.php' => 'b0612b826a5e8bcdf107fb80629ce13163c0f4a2',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\MappedReader.php' => '251c39affa89ad16684297b81178856322c2f828',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\Middleware\\CellMiddleware.php' => '51efbab728440dac645191838499f0b4ea1a81b8',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\Middleware\\ConvertEmptyCellValuesToNull.php' => '58b693ba5706e0e392b4fdc87638126ac7c938e6',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\Middleware\\TrimCellValue.php' => 'aca429a6db3f4a501a20c23935e7a5ee2370ea32',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\Mixins\\DownloadCollectionMixin.php' => '97d91e4e020e906d42dd36af044a4a81119e2075',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\Mixins\\DownloadQueryMacro.php' => '327489c04328c6ef2f3c0d7e2cd3fd973b1c254b',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\Mixins\\ImportAsMacro.php' => 'e0827a3ea5ff3a1a379dfd60319beea5af1af5f1',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\Mixins\\ImportMacro.php' => '3f1eb9420909ceb14b44f86bf82feb6b1130fa4e',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\Mixins\\StoreCollectionMixin.php' => '53406e685c4b328d3f2746bc1d57fac55dd056aa',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\Mixins\\StoreQueryMacro.php' => '068bac80033f95f6cd783154aa741fe013030339',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\QueuedWriter.php' => 'aee44d89596bba8e15ea97456f0f77317670d7b6',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\Reader.php' => '33965a55a716a3916262705f0d21f01b1d9ae757',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\RegistersCustomConcerns.php' => '19a18236390ad6bb98190b86c3f6103bf53e351f',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\Row.php' => '640c47c74dc32320a8eb696f7090fed39dd0f9b0',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\SettingsProvider.php' => '9eb86921dde0070bd03f9518f8617814e1383a69',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\Sheet.php' => 'e33ee3a58c64f795c794a247d08c08947a494b04',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\Transactions\\DbTransactionHandler.php' => '484581a1503f9d83cd5664c91295cd7c87aa8e2c',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\Transactions\\NullTransactionHandler.php' => '12f2001033e28827fc6c3c15538a527f2e76fe24',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\Transactions\\TransactionHandler.php' => 'f7a74b3b8550a03b3deca31a2c203c8a4994c4ce',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\Transactions\\TransactionManager.php' => '7a308bf22d89c14eddbf91b4401d9bd1d4542af3',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\Validators\\Failure.php' => '6d2fd6a4c414914e84e80276bddc8dd5184d95e8',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\Validators\\RowValidator.php' => '667bed07ab985d1c311c22ac6b8db444ecd395ee',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\Validators\\ValidationException.php' => '3096132c847383316332223e093ff9ad1f8f800b',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\maatwebsite\\excel\\src\\Writer.php' => '5cbdb2c771646a8fd98d4143d9233a2ccec46a06',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\spatie\\laravel-permission\\src\\Commands\\CacheReset.php' => '96999034b15a106232494b01a55e864448f5cdb7',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\spatie\\laravel-permission\\src\\Commands\\CreatePermission.php' => '14ee4cfd707c02475edd04238faf96228bf44be3',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\spatie\\laravel-permission\\src\\Commands\\CreateRole.php' => '754f87689cd220c94ca5e613cf05ef0a6e43ad8a',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\spatie\\laravel-permission\\src\\Commands\\Show.php' => '29c4cd1e824856e955ddd1a45eca16f49b3c680c',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\spatie\\laravel-permission\\src\\Commands\\UpgradeForTeams.php' => '468f7a72d6474f5826bbf10edc6a461cdddbcfbd',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\spatie\\laravel-permission\\src\\Contracts\\Permission.php' => '88ef32085801c96ec96a9ed5e7a232e0115d16cc',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\spatie\\laravel-permission\\src\\Contracts\\PermissionsTeamResolver.php' => '97aadcab704a7a16694abd1ce8935fbeae499c06',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\spatie\\laravel-permission\\src\\Contracts\\Role.php' => '1c2ba2f9199da2747dd047b584029091732d1bed',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\spatie\\laravel-permission\\src\\Contracts\\Wildcard.php' => 'd63182ed6b93b9dd6029f145b6b1d63b2ddd5e97',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\spatie\\laravel-permission\\src\\DefaultTeamResolver.php' => 'c0a967b237e87ec9523b7a38cdeab6bb4400a958',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\spatie\\laravel-permission\\src\\Events\\PermissionAttached.php' => '2142cf599e2f130c8533fd11d06ce4c3d760fa26',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\spatie\\laravel-permission\\src\\Events\\PermissionDetached.php' => '01a9de10c4ccaff84dfa299971a3df533d120e8a',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\spatie\\laravel-permission\\src\\Events\\RoleAttached.php' => '06988a67340bf599b8a21ceffb1881d151b26a8a',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\spatie\\laravel-permission\\src\\Events\\RoleDetached.php' => 'b98c0f307c26784b1a07f7cef3720ab55a2769e9',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\spatie\\laravel-permission\\src\\Exceptions\\GuardDoesNotMatch.php' => '8e163e3c801335ecf6f7058f812bfa9472ac3589',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\spatie\\laravel-permission\\src\\Exceptions\\PermissionAlreadyExists.php' => '6dd3574d2235fb28408025f3a24adeaa223801b3',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\spatie\\laravel-permission\\src\\Exceptions\\PermissionDoesNotExist.php' => '2b041fa29c442cf0222f53eca0111760a6b4d0c9',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\spatie\\laravel-permission\\src\\Exceptions\\RoleAlreadyExists.php' => 'bf2870b5b0ba1561b3d6353cdb93b4351f3a800b',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\spatie\\laravel-permission\\src\\Exceptions\\RoleDoesNotExist.php' => '1171320a3e48e01e66b6c5859de586e9caf44c4a',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\spatie\\laravel-permission\\src\\Exceptions\\UnauthorizedException.php' => '8d5c1c3249041b89c37025f72fe07d40de5db08a',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\spatie\\laravel-permission\\src\\Exceptions\\WildcardPermissionInvalidArgument.php' => '63283b9e1e806ebd72d02478a1d92dcba10aefe3',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\spatie\\laravel-permission\\src\\Exceptions\\WildcardPermissionNotImplementsContract.php' => '723f6ed34842be0654d6e7d4d116ee42b2e3f117',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\spatie\\laravel-permission\\src\\Exceptions\\WildcardPermissionNotProperlyFormatted.php' => 'a197393e4dd2d0dcf9171f344db1d32a18803238',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\spatie\\laravel-permission\\src\\Guard.php' => '03db22441bb544c00a8d2f0e778157e0c3e7a798',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\spatie\\laravel-permission\\src\\Middleware\\PermissionMiddleware.php' => 'e331f4219e2ce5dbe7601611a3ffbdb3b768a2eb',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\spatie\\laravel-permission\\src\\Middleware\\RoleMiddleware.php' => '90c2ffdc7da4a2552ff201c6713eab3fe50c1aa8',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\spatie\\laravel-permission\\src\\Middleware\\RoleOrPermissionMiddleware.php' => 'e30d37e0fbf7568bb6e51b45c2614e09e8af0c0c',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\spatie\\laravel-permission\\src\\Models\\Permission.php' => 'd5518d922a0b9369387cb85d927661bea9f3f911',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\spatie\\laravel-permission\\src\\Models\\Role.php' => 'b512b9372d07151a0493a02c1051513e31e462d1',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\spatie\\laravel-permission\\src\\PermissionRegistrar.php' => '790b8eca9f80c387baae5c043b509a4196c6a297',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\spatie\\laravel-permission\\src\\PermissionServiceProvider.php' => 'e9f16c125a461651d6015b8dbe14c9f47372c03e',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\spatie\\laravel-permission\\src\\Traits\\HasPermissions.php' => '5675ec93c81a0f120cfdd21dc5fe29293ac46ffe',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\spatie\\laravel-permission\\src\\Traits\\HasRoles.php' => '353db4ba29d2845524e9f847f0dfde6287bf2e6d',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\spatie\\laravel-permission\\src\\Traits\\RefreshesPermissionCache.php' => '309d9d888245184381a3f1e5f16ed65a4693792d',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\spatie\\laravel-permission\\src\\WildcardPermission.php' => '5eb62f5825ac5d13f34898eee29719015fe298b2',
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\spatie\\laravel-permission\\src\\helpers.php' => '1c5f3c77bfc091a86e197b571482ec525961b5e8',
  ),
  'composerLocks' => 
  array (
    'C:/xampp/htdocs/homestay-system-131025/composer.lock' => 'c98a474be525a37235567696ba6e253b2da7daaf',
  ),
  'composerInstalled' => 
  array (
    'C:/xampp/htdocs/homestay-system-131025/vendor/composer/installed.php' => 
    array (
      'versions' => 
      array (
        'barryvdh/laravel-dompdf' => 
        array (
          'pretty_version' => 'v3.1.1',
          'version' => '3.1.1.0',
          'reference' => '8e71b99fc53bb8eb77f316c3c452dd74ab7cb25d',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../barryvdh/laravel-dompdf',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'brick/math' => 
        array (
          'pretty_version' => '0.14.0',
          'version' => '0.14.0.0',
          'reference' => '113a8ee2656b882d4c3164fa31aa6e12cbb7aaa2',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../brick/math',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'carbonphp/carbon-doctrine-types' => 
        array (
          'pretty_version' => '3.2.0',
          'version' => '3.2.0.0',
          'reference' => '18ba5ddfec8976260ead6e866180bd5d2f71aa1d',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../carbonphp/carbon-doctrine-types',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'clue/ndjson-react' => 
        array (
          'pretty_version' => 'v1.3.0',
          'version' => '1.3.0.0',
          'reference' => '392dc165fce93b5bb5c637b67e59619223c931b0',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../clue/ndjson-react',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'cmgmyr/phploc' => 
        array (
          'pretty_version' => '8.0.6',
          'version' => '8.0.6.0',
          'reference' => '5d785f8fc8b891483cdbee3fb25f2b348c50c03f',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../cmgmyr/phploc',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'composer/pcre' => 
        array (
          'pretty_version' => '3.3.2',
          'version' => '3.3.2.0',
          'reference' => 'b2bed4734f0cc156ee1fe9c0da2550420d99a21e',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/./pcre',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'composer/semver' => 
        array (
          'pretty_version' => '3.4.4',
          'version' => '3.4.4.0',
          'reference' => '198166618906cb2de69b95d7d47e5fa8aa1b2b95',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/./semver',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'composer/xdebug-handler' => 
        array (
          'pretty_version' => '3.0.5',
          'version' => '3.0.5.0',
          'reference' => '6c1925561632e83d60a44492e0b344cf48ab85ef',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/./xdebug-handler',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'cordoval/hamcrest-php' => 
        array (
          'dev_requirement' => true,
          'replaced' => 
          array (
            0 => '*',
          ),
        ),
        'davedevelopment/hamcrest-php' => 
        array (
          'dev_requirement' => true,
          'replaced' => 
          array (
            0 => '*',
          ),
        ),
        'dealerdirect/phpcodesniffer-composer-installer' => 
        array (
          'pretty_version' => 'v1.1.2',
          'version' => '1.1.2.0',
          'reference' => 'e9cf5e4bbf7eeaf9ef5db34938942602838fc2b1',
          'type' => 'composer-plugin',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../dealerdirect/phpcodesniffer-composer-installer',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'dflydev/dot-access-data' => 
        array (
          'pretty_version' => 'v3.0.3',
          'version' => '3.0.3.0',
          'reference' => 'a23a2bf4f31d3518f3ecb38660c95715dfead60f',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../dflydev/dot-access-data',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'doctrine/inflector' => 
        array (
          'pretty_version' => '2.1.0',
          'version' => '2.1.0.0',
          'reference' => '6d6c96277ea252fc1304627204c3d5e6e15faa3b',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../doctrine/inflector',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'doctrine/lexer' => 
        array (
          'pretty_version' => '3.0.1',
          'version' => '3.0.1.0',
          'reference' => '31ad66abc0fc9e1a1f2d9bc6a42668d2fbbcd6dd',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../doctrine/lexer',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'dompdf/dompdf' => 
        array (
          'pretty_version' => 'v3.1.2',
          'version' => '3.1.2.0',
          'reference' => 'b3493e35d31a5e76ec24c3b64a29b0034b2f32a6',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../dompdf/dompdf',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'dompdf/php-font-lib' => 
        array (
          'pretty_version' => '1.0.1',
          'version' => '1.0.1.0',
          'reference' => '6137b7d4232b7f16c882c75e4ca3991dbcf6fe2d',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../dompdf/php-font-lib',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'dompdf/php-svg-lib' => 
        array (
          'pretty_version' => '1.0.0',
          'version' => '1.0.0.0',
          'reference' => 'eb045e518185298eb6ff8d80d0d0c6b17aecd9af',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../dompdf/php-svg-lib',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'dragonmantank/cron-expression' => 
        array (
          'pretty_version' => 'v3.4.0',
          'version' => '3.4.0.0',
          'reference' => '8c784d071debd117328803d86b2097615b457500',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../dragonmantank/cron-expression',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'egulias/email-validator' => 
        array (
          'pretty_version' => '4.0.4',
          'version' => '4.0.4.0',
          'reference' => 'd42c8731f0624ad6bdc8d3e5e9a4524f68801cfa',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../egulias/email-validator',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'evenement/evenement' => 
        array (
          'pretty_version' => 'v3.0.2',
          'version' => '3.0.2.0',
          'reference' => '0a16b0d71ab13284339abb99d9d2bd813640efbc',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../evenement/evenement',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'ezyang/htmlpurifier' => 
        array (
          'pretty_version' => 'v4.18.0',
          'version' => '4.18.0.0',
          'reference' => 'cb56001e54359df7ae76dc522d08845dc741621b',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../ezyang/htmlpurifier',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'fakerphp/faker' => 
        array (
          'pretty_version' => 'v1.24.1',
          'version' => '1.24.1.0',
          'reference' => 'e0ee18eb1e6dc3cda3ce9fd97e5a0689a88a64b5',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../fakerphp/faker',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'fidry/cpu-core-counter' => 
        array (
          'pretty_version' => '1.3.0',
          'version' => '1.3.0.0',
          'reference' => 'db9508f7b1474469d9d3c53b86f817e344732678',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../fidry/cpu-core-counter',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'filp/whoops' => 
        array (
          'pretty_version' => '2.18.4',
          'version' => '2.18.4.0',
          'reference' => 'd2102955e48b9fd9ab24280a7ad12ed552752c4d',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../filp/whoops',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'friendsofphp/php-cs-fixer' => 
        array (
          'pretty_version' => 'v3.88.2',
          'version' => '3.88.2.0',
          'reference' => 'a8d15584bafb0f0d9d938827840060fd4a3ebc99',
          'type' => 'application',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../friendsofphp/php-cs-fixer',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'fruitcake/php-cors' => 
        array (
          'pretty_version' => 'v1.3.0',
          'version' => '1.3.0.0',
          'reference' => '3d158f36e7875e2f040f37bc0573956240a5a38b',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../fruitcake/php-cors',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'graham-campbell/result-type' => 
        array (
          'pretty_version' => 'v1.1.3',
          'version' => '1.1.3.0',
          'reference' => '3ba905c11371512af9d9bdd27d99b782216b6945',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../graham-campbell/result-type',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'grogy/php-parallel-lint' => 
        array (
          'dev_requirement' => true,
          'replaced' => 
          array (
            0 => '*',
          ),
        ),
        'guzzlehttp/guzzle' => 
        array (
          'pretty_version' => '7.10.0',
          'version' => '7.10.0.0',
          'reference' => 'b51ac707cfa420b7bfd4e4d5e510ba8008e822b4',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../guzzlehttp/guzzle',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'guzzlehttp/promises' => 
        array (
          'pretty_version' => '2.3.0',
          'version' => '2.3.0.0',
          'reference' => '481557b130ef3790cf82b713667b43030dc9c957',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../guzzlehttp/promises',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'guzzlehttp/psr7' => 
        array (
          'pretty_version' => '2.8.0',
          'version' => '2.8.0.0',
          'reference' => '21dc724a0583619cd1652f673303492272778051',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../guzzlehttp/psr7',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'guzzlehttp/uri-template' => 
        array (
          'pretty_version' => 'v1.0.5',
          'version' => '1.0.5.0',
          'reference' => '4f4bbd4e7172148801e76e3decc1e559bdee34e1',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../guzzlehttp/uri-template',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'hamcrest/hamcrest-php' => 
        array (
          'pretty_version' => 'v2.1.1',
          'version' => '2.1.1.0',
          'reference' => 'f8b1c0173b22fa6ec77a81fe63e5b01eba7e6487',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../hamcrest/hamcrest-php',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'iamcal/sql-parser' => 
        array (
          'pretty_version' => 'v0.6',
          'version' => '0.6.0.0',
          'reference' => '947083e2dca211a6f12fb1beb67a01e387de9b62',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../iamcal/sql-parser',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'illuminate/auth' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.33.0',
          ),
        ),
        'illuminate/broadcasting' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.33.0',
          ),
        ),
        'illuminate/bus' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.33.0',
          ),
        ),
        'illuminate/cache' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.33.0',
          ),
        ),
        'illuminate/collections' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.33.0',
          ),
        ),
        'illuminate/concurrency' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.33.0',
          ),
        ),
        'illuminate/conditionable' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.33.0',
          ),
        ),
        'illuminate/config' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.33.0',
          ),
        ),
        'illuminate/console' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.33.0',
          ),
        ),
        'illuminate/container' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.33.0',
          ),
        ),
        'illuminate/contracts' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.33.0',
          ),
        ),
        'illuminate/cookie' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.33.0',
          ),
        ),
        'illuminate/database' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.33.0',
          ),
        ),
        'illuminate/encryption' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.33.0',
          ),
        ),
        'illuminate/events' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.33.0',
          ),
        ),
        'illuminate/filesystem' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.33.0',
          ),
        ),
        'illuminate/hashing' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.33.0',
          ),
        ),
        'illuminate/http' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.33.0',
          ),
        ),
        'illuminate/json-schema' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.33.0',
          ),
        ),
        'illuminate/log' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.33.0',
          ),
        ),
        'illuminate/macroable' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.33.0',
          ),
        ),
        'illuminate/mail' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.33.0',
          ),
        ),
        'illuminate/notifications' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.33.0',
          ),
        ),
        'illuminate/pagination' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.33.0',
          ),
        ),
        'illuminate/pipeline' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.33.0',
          ),
        ),
        'illuminate/process' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.33.0',
          ),
        ),
        'illuminate/queue' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.33.0',
          ),
        ),
        'illuminate/redis' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.33.0',
          ),
        ),
        'illuminate/routing' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.33.0',
          ),
        ),
        'illuminate/session' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.33.0',
          ),
        ),
        'illuminate/support' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.33.0',
          ),
        ),
        'illuminate/testing' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.33.0',
          ),
        ),
        'illuminate/translation' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.33.0',
          ),
        ),
        'illuminate/validation' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.33.0',
          ),
        ),
        'illuminate/view' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.33.0',
          ),
        ),
        'intervention/gif' => 
        array (
          'pretty_version' => '4.2.2',
          'version' => '4.2.2.0',
          'reference' => '5999eac6a39aa760fb803bc809e8909ee67b451a',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../intervention/gif',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'intervention/image' => 
        array (
          'pretty_version' => '3.11.4',
          'version' => '3.11.4.0',
          'reference' => '8c49eb21a6d2572532d1bc425964264f3e496846',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../intervention/image',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'jakub-onderka/php-parallel-lint' => 
        array (
          'dev_requirement' => true,
          'replaced' => 
          array (
            0 => '*',
          ),
        ),
        'justinrainbow/json-schema' => 
        array (
          'pretty_version' => '6.6.0',
          'version' => '6.6.0.0',
          'reference' => '68ba7677532803cc0c5900dd5a4d730537f2b2f3',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../justinrainbow/json-schema',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'kodova/hamcrest-php' => 
        array (
          'dev_requirement' => true,
          'replaced' => 
          array (
            0 => '*',
          ),
        ),
        'larastan/larastan' => 
        array (
          'pretty_version' => 'v3.7.2',
          'version' => '3.7.2.0',
          'reference' => 'a761859a7487bd7d0cb8b662a7538a234d5bb5ae',
          'type' => 'phpstan-extension',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../larastan/larastan',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'laravel/boost' => 
        array (
          'pretty_version' => 'v1.3.0',
          'version' => '1.3.0.0',
          'reference' => 'ef8800843efc581965c38393adb63ba336dc3979',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../laravel/boost',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'laravel/framework' => 
        array (
          'pretty_version' => 'v12.33.0',
          'version' => '12.33.0.0',
          'reference' => '124efc5f09d4668a4dc13f94a1018c524a58bcb1',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../laravel/framework',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'laravel/mcp' => 
        array (
          'pretty_version' => 'v0.2.1',
          'version' => '0.2.1.0',
          'reference' => '0ecf0c04b20e5946ae080e8d67984d5c555174b0',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../laravel/mcp',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'laravel/pail' => 
        array (
          'pretty_version' => 'v1.2.3',
          'version' => '1.2.3.0',
          'reference' => '8cc3d575c1f0e57eeb923f366a37528c50d2385a',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../laravel/pail',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'laravel/pint' => 
        array (
          'pretty_version' => 'v1.25.1',
          'version' => '1.25.1.0',
          'reference' => '5016e263f95d97670d71b9a987bd8996ade6d8d9',
          'type' => 'project',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../laravel/pint',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'laravel/prompts' => 
        array (
          'pretty_version' => 'v0.3.7',
          'version' => '0.3.7.0',
          'reference' => 'a1891d362714bc40c8d23b0b1d7090f022ea27cc',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../laravel/prompts',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'laravel/roster' => 
        array (
          'pretty_version' => 'v0.2.8',
          'version' => '0.2.8.0',
          'reference' => '832a6db43743bf08a58691da207f977ec8dc43aa',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../laravel/roster',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'laravel/sail' => 
        array (
          'pretty_version' => 'v1.46.0',
          'version' => '1.46.0.0',
          'reference' => 'eb90c4f113c4a9637b8fdd16e24cfc64f2b0ae6e',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../laravel/sail',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'laravel/sanctum' => 
        array (
          'pretty_version' => 'v4.2.0',
          'version' => '4.2.0.0',
          'reference' => 'fd6df4f79f48a72992e8d29a9c0ee25422a0d677',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../laravel/sanctum',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'laravel/serializable-closure' => 
        array (
          'pretty_version' => 'v2.0.5',
          'version' => '2.0.5.0',
          'reference' => '3832547db6e0e2f8bb03d4093857b378c66eceed',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../laravel/serializable-closure',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'laravel/tinker' => 
        array (
          'pretty_version' => 'v2.10.1',
          'version' => '2.10.1.0',
          'reference' => '22177cc71807d38f2810c6204d8f7183d88a57d3',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../laravel/tinker',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'league/commonmark' => 
        array (
          'pretty_version' => '2.7.1',
          'version' => '2.7.1.0',
          'reference' => '10732241927d3971d28e7ea7b5712721fa2296ca',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../league/commonmark',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'league/config' => 
        array (
          'pretty_version' => 'v1.2.0',
          'version' => '1.2.0.0',
          'reference' => '754b3604fb2984c71f4af4a9cbe7b57f346ec1f3',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../league/config',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'league/container' => 
        array (
          'pretty_version' => '5.1.0',
          'version' => '5.1.0.0',
          'reference' => '041c52d266763887fff2256fb5dc9392d808f8f3',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../league/container',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'league/flysystem' => 
        array (
          'pretty_version' => '3.30.0',
          'version' => '3.30.0.0',
          'reference' => '2203e3151755d874bb2943649dae1eb8533ac93e',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../league/flysystem',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'league/flysystem-local' => 
        array (
          'pretty_version' => '3.30.0',
          'version' => '3.30.0.0',
          'reference' => '6691915f77c7fb69adfb87dcd550052dc184ee10',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../league/flysystem-local',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'league/mime-type-detection' => 
        array (
          'pretty_version' => '1.16.0',
          'version' => '1.16.0.0',
          'reference' => '2d6702ff215bf922936ccc1ad31007edc76451b9',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../league/mime-type-detection',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'league/uri' => 
        array (
          'pretty_version' => '7.5.1',
          'version' => '7.5.1.0',
          'reference' => '81fb5145d2644324614cc532b28efd0215bda430',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../league/uri',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'league/uri-interfaces' => 
        array (
          'pretty_version' => '7.5.0',
          'version' => '7.5.0.0',
          'reference' => '08cfc6c4f3d811584fb09c37e2849e6a7f9b0742',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../league/uri-interfaces',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'maatwebsite/excel' => 
        array (
          'pretty_version' => '3.1.67',
          'version' => '3.1.67.0',
          'reference' => 'e508e34a502a3acc3329b464dad257378a7edb4d',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../maatwebsite/excel',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'maennchen/zipstream-php' => 
        array (
          'pretty_version' => '3.1.2',
          'version' => '3.1.2.0',
          'reference' => 'aeadcf5c412332eb426c0f9b4485f6accba2a99f',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../maennchen/zipstream-php',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'marc-mabe/php-enum' => 
        array (
          'pretty_version' => 'v4.7.2',
          'version' => '4.7.2.0',
          'reference' => 'bb426fcdd65c60fb3638ef741e8782508fda7eef',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../marc-mabe/php-enum',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'markbaker/complex' => 
        array (
          'pretty_version' => '3.0.2',
          'version' => '3.0.2.0',
          'reference' => '95c56caa1cf5c766ad6d65b6344b807c1e8405b9',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../markbaker/complex',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'markbaker/matrix' => 
        array (
          'pretty_version' => '3.0.1',
          'version' => '3.0.1.0',
          'reference' => '728434227fe21be27ff6d86621a1b13107a2562c',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../markbaker/matrix',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'masterminds/html5' => 
        array (
          'pretty_version' => '2.10.0',
          'version' => '2.10.0.0',
          'reference' => 'fcf91eb64359852f00d921887b219479b4f21251',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../masterminds/html5',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'mockery/mockery' => 
        array (
          'pretty_version' => '1.6.12',
          'version' => '1.6.12.0',
          'reference' => '1f4efdd7d3beafe9807b08156dfcb176d18f1699',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../mockery/mockery',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'monolog/monolog' => 
        array (
          'pretty_version' => '3.9.0',
          'version' => '3.9.0.0',
          'reference' => '10d85740180ecba7896c87e06a166e0c95a0e3b6',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../monolog/monolog',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'mtdowling/cron-expression' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => '^1.0',
          ),
        ),
        'myclabs/deep-copy' => 
        array (
          'pretty_version' => '1.13.4',
          'version' => '1.13.4.0',
          'reference' => '07d290f0c47959fd5eed98c95ee5602db07e0b6a',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../myclabs/deep-copy',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'nesbot/carbon' => 
        array (
          'pretty_version' => '3.10.3',
          'version' => '3.10.3.0',
          'reference' => '8e3643dcd149ae0fe1d2ff4f2c8e4bbfad7c165f',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../nesbot/carbon',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'nette/schema' => 
        array (
          'pretty_version' => 'v1.3.2',
          'version' => '1.3.2.0',
          'reference' => 'da801d52f0354f70a638673c4a0f04e16529431d',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../nette/schema',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'nette/utils' => 
        array (
          'pretty_version' => 'v4.0.8',
          'version' => '4.0.8.0',
          'reference' => 'c930ca4e3cf4f17dcfb03037703679d2396d2ede',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../nette/utils',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'nikic/php-parser' => 
        array (
          'pretty_version' => 'v5.6.1',
          'version' => '5.6.1.0',
          'reference' => 'f103601b29efebd7ff4a1ca7b3eeea9e3336a2a2',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../nikic/php-parser',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'nunomaduro/collision' => 
        array (
          'pretty_version' => 'v8.8.2',
          'version' => '8.8.2.0',
          'reference' => '60207965f9b7b7a4ce15a0f75d57f9dadb105bdb',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../nunomaduro/collision',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'nunomaduro/phpinsights' => 
        array (
          'pretty_version' => 'v2.13.1',
          'version' => '2.13.1.0',
          'reference' => '77572bb0d3a6fbbd36aa000a619fd5c89b10d3df',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../nunomaduro/phpinsights',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'nunomaduro/termwind' => 
        array (
          'pretty_version' => 'v2.3.1',
          'version' => '2.3.1.0',
          'reference' => 'dfa08f390e509967a15c22493dc0bac5733d9123',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../nunomaduro/termwind',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'orno/di' => 
        array (
          'dev_requirement' => true,
          'replaced' => 
          array (
            0 => '~2.0',
          ),
        ),
        'phar-io/manifest' => 
        array (
          'pretty_version' => '2.0.4',
          'version' => '2.0.4.0',
          'reference' => '54750ef60c58e43759730615a392c31c80e23176',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../phar-io/manifest',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'phar-io/version' => 
        array (
          'pretty_version' => '3.2.1',
          'version' => '3.2.1.0',
          'reference' => '4f7fd7836c6f332bb2933569e566a0d6c4cbed74',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../phar-io/version',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'php-http/async-client-implementation' => 
        array (
          'dev_requirement' => true,
          'provided' => 
          array (
            0 => '*',
          ),
        ),
        'php-http/client-implementation' => 
        array (
          'dev_requirement' => true,
          'provided' => 
          array (
            0 => '*',
          ),
        ),
        'php-parallel-lint/php-parallel-lint' => 
        array (
          'pretty_version' => 'v1.4.0',
          'version' => '1.4.0.0',
          'reference' => '6db563514f27e19595a19f45a4bf757b6401194e',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../php-parallel-lint/php-parallel-lint',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'phpoffice/phpspreadsheet' => 
        array (
          'pretty_version' => '1.30.0',
          'version' => '1.30.0.0',
          'reference' => '2f39286e0136673778b7a142b3f0d141e43d1714',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../phpoffice/phpspreadsheet',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'phpoption/phpoption' => 
        array (
          'pretty_version' => '1.9.4',
          'version' => '1.9.4.0',
          'reference' => '638a154f8d4ee6a5cfa96d6a34dfbe0cffa9566d',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../phpoption/phpoption',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'phpstan/phpdoc-parser' => 
        array (
          'pretty_version' => '2.3.0',
          'version' => '2.3.0.0',
          'reference' => '1e0cd5370df5dd2e556a36b9c62f62e555870495',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../phpstan/phpdoc-parser',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'phpstan/phpstan' => 
        array (
          'pretty_version' => '2.1.31',
          'version' => '2.1.31.0',
          'reference' => 'ead89849d879fe203ce9292c6ef5e7e76f867b96',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../phpstan/phpstan',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'phpunit/php-code-coverage' => 
        array (
          'pretty_version' => '11.0.11',
          'version' => '11.0.11.0',
          'reference' => '4f7722aa9a7b76aa775e2d9d4e95d1ea16eeeef4',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../phpunit/php-code-coverage',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'phpunit/php-file-iterator' => 
        array (
          'pretty_version' => '5.1.0',
          'version' => '5.1.0.0',
          'reference' => '118cfaaa8bc5aef3287bf315b6060b1174754af6',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../phpunit/php-file-iterator',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'phpunit/php-invoker' => 
        array (
          'pretty_version' => '5.0.1',
          'version' => '5.0.1.0',
          'reference' => 'c1ca3814734c07492b3d4c5f794f4b0995333da2',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../phpunit/php-invoker',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'phpunit/php-text-template' => 
        array (
          'pretty_version' => '4.0.1',
          'version' => '4.0.1.0',
          'reference' => '3e0404dc6b300e6bf56415467ebcb3fe4f33e964',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../phpunit/php-text-template',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'phpunit/php-timer' => 
        array (
          'pretty_version' => '7.0.1',
          'version' => '7.0.1.0',
          'reference' => '3b415def83fbcb41f991d9ebf16ae4ad8b7837b3',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../phpunit/php-timer',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'phpunit/phpunit' => 
        array (
          'pretty_version' => '11.5.42',
          'version' => '11.5.42.0',
          'reference' => '1c6cb5dfe412af3d0dfd414cfd110e3b9cfdbc3c',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../phpunit/phpunit',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'psr/cache' => 
        array (
          'pretty_version' => '3.0.0',
          'version' => '3.0.0.0',
          'reference' => 'aa5030cfa5405eccfdcb1083ce040c2cb8d253bf',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../psr/cache',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'psr/cache-implementation' => 
        array (
          'dev_requirement' => true,
          'provided' => 
          array (
            0 => '2.0|3.0',
          ),
        ),
        'psr/clock' => 
        array (
          'pretty_version' => '1.0.0',
          'version' => '1.0.0.0',
          'reference' => 'e41a24703d4560fd0acb709162f73b8adfc3aa0d',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../psr/clock',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'psr/clock-implementation' => 
        array (
          'dev_requirement' => false,
          'provided' => 
          array (
            0 => '1.0',
          ),
        ),
        'psr/container' => 
        array (
          'pretty_version' => '2.0.2',
          'version' => '2.0.2.0',
          'reference' => 'c71ecc56dfe541dbd90c5360474fbc405f8d5963',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../psr/container',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'psr/container-implementation' => 
        array (
          'dev_requirement' => false,
          'provided' => 
          array (
            0 => '1.1|2.0',
            1 => '^1.0',
          ),
        ),
        'psr/event-dispatcher' => 
        array (
          'pretty_version' => '1.0.0',
          'version' => '1.0.0.0',
          'reference' => 'dbefd12671e8a14ec7f180cab83036ed26714bb0',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../psr/event-dispatcher',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'psr/event-dispatcher-implementation' => 
        array (
          'dev_requirement' => false,
          'provided' => 
          array (
            0 => '1.0',
          ),
        ),
        'psr/http-client' => 
        array (
          'pretty_version' => '1.0.3',
          'version' => '1.0.3.0',
          'reference' => 'bb5906edc1c324c9a05aa0873d40117941e5fa90',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../psr/http-client',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'psr/http-client-implementation' => 
        array (
          'dev_requirement' => false,
          'provided' => 
          array (
            0 => '1.0',
          ),
        ),
        'psr/http-factory' => 
        array (
          'pretty_version' => '1.1.0',
          'version' => '1.1.0.0',
          'reference' => '2b4765fddfe3b508ac62f829e852b1501d3f6e8a',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../psr/http-factory',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'psr/http-factory-implementation' => 
        array (
          'dev_requirement' => false,
          'provided' => 
          array (
            0 => '1.0',
          ),
        ),
        'psr/http-message' => 
        array (
          'pretty_version' => '2.0',
          'version' => '2.0.0.0',
          'reference' => '402d35bcb92c70c026d1a6a9883f06b2ead23d71',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../psr/http-message',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'psr/http-message-implementation' => 
        array (
          'dev_requirement' => false,
          'provided' => 
          array (
            0 => '1.0',
          ),
        ),
        'psr/log' => 
        array (
          'pretty_version' => '3.0.2',
          'version' => '3.0.2.0',
          'reference' => 'f16e1d5863e37f8d8c2a01719f5b34baa2b714d3',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../psr/log',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'psr/log-implementation' => 
        array (
          'dev_requirement' => false,
          'provided' => 
          array (
            0 => '1.0|2.0|3.0',
            1 => '3.0.0',
          ),
        ),
        'psr/simple-cache' => 
        array (
          'pretty_version' => '3.0.0',
          'version' => '3.0.0.0',
          'reference' => '764e0b3939f5ca87cb904f570ef9be2d78a07865',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../psr/simple-cache',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'psr/simple-cache-implementation' => 
        array (
          'dev_requirement' => false,
          'provided' => 
          array (
            0 => '1.0|2.0|3.0',
          ),
        ),
        'psy/psysh' => 
        array (
          'pretty_version' => 'v0.12.12',
          'version' => '0.12.12.0',
          'reference' => 'cd23863404a40ccfaf733e3af4db2b459837f7e7',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../psy/psysh',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'ralouphie/getallheaders' => 
        array (
          'pretty_version' => '3.0.3',
          'version' => '3.0.3.0',
          'reference' => '120b605dfeb996808c31b6477290a714d356e822',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../ralouphie/getallheaders',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'ramsey/collection' => 
        array (
          'pretty_version' => '2.1.1',
          'version' => '2.1.1.0',
          'reference' => '344572933ad0181accbf4ba763e85a0306a8c5e2',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../ramsey/collection',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'ramsey/uuid' => 
        array (
          'pretty_version' => '4.9.1',
          'version' => '4.9.1.0',
          'reference' => '81f941f6f729b1e3ceea61d9d014f8b6c6800440',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../ramsey/uuid',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'react/cache' => 
        array (
          'pretty_version' => 'v1.2.0',
          'version' => '1.2.0.0',
          'reference' => 'd47c472b64aa5608225f47965a484b75c7817d5b',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../react/cache',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'react/child-process' => 
        array (
          'pretty_version' => 'v0.6.6',
          'version' => '0.6.6.0',
          'reference' => '1721e2b93d89b745664353b9cfc8f155ba8a6159',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../react/child-process',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'react/dns' => 
        array (
          'pretty_version' => 'v1.13.0',
          'version' => '1.13.0.0',
          'reference' => 'eb8ae001b5a455665c89c1df97f6fb682f8fb0f5',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../react/dns',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'react/event-loop' => 
        array (
          'pretty_version' => 'v1.5.0',
          'version' => '1.5.0.0',
          'reference' => 'bbe0bd8c51ffc05ee43f1729087ed3bdf7d53354',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../react/event-loop',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'react/promise' => 
        array (
          'pretty_version' => 'v3.3.0',
          'version' => '3.3.0.0',
          'reference' => '23444f53a813a3296c1368bb104793ce8d88f04a',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../react/promise',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'react/socket' => 
        array (
          'pretty_version' => 'v1.16.0',
          'version' => '1.16.0.0',
          'reference' => '23e4ff33ea3e160d2d1f59a0e6050e4b0fb0eac1',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../react/socket',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'react/stream' => 
        array (
          'pretty_version' => 'v1.4.0',
          'version' => '1.4.0.0',
          'reference' => '1e5b0acb8fe55143b5b426817155190eb6f5b18d',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../react/stream',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'rhumsaa/uuid' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => '4.9.1',
          ),
        ),
        'sabberworm/php-css-parser' => 
        array (
          'pretty_version' => 'v8.9.0',
          'version' => '8.9.0.0',
          'reference' => 'd8e916507b88e389e26d4ab03c904a082aa66bb9',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../sabberworm/php-css-parser',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'sebastian/cli-parser' => 
        array (
          'pretty_version' => '3.0.2',
          'version' => '3.0.2.0',
          'reference' => '15c5dd40dc4f38794d383bb95465193f5e0ae180',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../sebastian/cli-parser',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'sebastian/code-unit' => 
        array (
          'pretty_version' => '3.0.3',
          'version' => '3.0.3.0',
          'reference' => '54391c61e4af8078e5b276ab082b6d3c54c9ad64',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../sebastian/code-unit',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'sebastian/code-unit-reverse-lookup' => 
        array (
          'pretty_version' => '4.0.1',
          'version' => '4.0.1.0',
          'reference' => '183a9b2632194febd219bb9246eee421dad8d45e',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../sebastian/code-unit-reverse-lookup',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'sebastian/comparator' => 
        array (
          'pretty_version' => '6.3.2',
          'version' => '6.3.2.0',
          'reference' => '85c77556683e6eee4323e4c5468641ca0237e2e8',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../sebastian/comparator',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'sebastian/complexity' => 
        array (
          'pretty_version' => '4.0.1',
          'version' => '4.0.1.0',
          'reference' => 'ee41d384ab1906c68852636b6de493846e13e5a0',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../sebastian/complexity',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'sebastian/diff' => 
        array (
          'pretty_version' => '6.0.2',
          'version' => '6.0.2.0',
          'reference' => 'b4ccd857127db5d41a5b676f24b51371d76d8544',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../sebastian/diff',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'sebastian/environment' => 
        array (
          'pretty_version' => '7.2.1',
          'version' => '7.2.1.0',
          'reference' => 'a5c75038693ad2e8d4b6c15ba2403532647830c4',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../sebastian/environment',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'sebastian/exporter' => 
        array (
          'pretty_version' => '6.3.2',
          'version' => '6.3.2.0',
          'reference' => '70a298763b40b213ec087c51c739efcaa90bcd74',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../sebastian/exporter',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'sebastian/global-state' => 
        array (
          'pretty_version' => '7.0.2',
          'version' => '7.0.2.0',
          'reference' => '3be331570a721f9a4b5917f4209773de17f747d7',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../sebastian/global-state',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'sebastian/lines-of-code' => 
        array (
          'pretty_version' => '3.0.1',
          'version' => '3.0.1.0',
          'reference' => 'd36ad0d782e5756913e42ad87cb2890f4ffe467a',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../sebastian/lines-of-code',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'sebastian/object-enumerator' => 
        array (
          'pretty_version' => '6.0.1',
          'version' => '6.0.1.0',
          'reference' => 'f5b498e631a74204185071eb41f33f38d64608aa',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../sebastian/object-enumerator',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'sebastian/object-reflector' => 
        array (
          'pretty_version' => '4.0.1',
          'version' => '4.0.1.0',
          'reference' => '6e1a43b411b2ad34146dee7524cb13a068bb35f9',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../sebastian/object-reflector',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'sebastian/recursion-context' => 
        array (
          'pretty_version' => '6.0.3',
          'version' => '6.0.3.0',
          'reference' => 'f6458abbf32a6c8174f8f26261475dc133b3d9dc',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../sebastian/recursion-context',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'sebastian/type' => 
        array (
          'pretty_version' => '5.1.3',
          'version' => '5.1.3.0',
          'reference' => 'f77d2d4e78738c98d9a68d2596fe5e8fa380f449',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../sebastian/type',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'sebastian/version' => 
        array (
          'pretty_version' => '5.0.2',
          'version' => '5.0.2.0',
          'reference' => 'c687e3387b99f5b03b6caa64c74b63e2936ff874',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../sebastian/version',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'slevomat/coding-standard' => 
        array (
          'pretty_version' => '8.22.1',
          'version' => '8.22.1.0',
          'reference' => '1dd80bf3b93692bedb21a6623c496887fad05fec',
          'type' => 'phpcodesniffer-standard',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../slevomat/coding-standard',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'spatie/laravel-permission' => 
        array (
          'pretty_version' => '6.21.0',
          'version' => '6.21.0.0',
          'reference' => '6a118e8855dfffcd90403aab77bbf35a03db51b3',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../spatie/laravel-permission',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'spatie/once' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => '*',
          ),
        ),
        'squizlabs/php_codesniffer' => 
        array (
          'pretty_version' => '3.13.4',
          'version' => '3.13.4.0',
          'reference' => 'ad545ea9c1b7d270ce0fc9cbfb884161cd706119',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../squizlabs/php_codesniffer',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'staabm/side-effects-detector' => 
        array (
          'pretty_version' => '1.0.5',
          'version' => '1.0.5.0',
          'reference' => 'd8334211a140ce329c13726d4a715adbddd0a163',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../staabm/side-effects-detector',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'symfony/cache' => 
        array (
          'pretty_version' => 'v7.3.4',
          'version' => '7.3.4.0',
          'reference' => 'bf8afc8ffd4bfd3d9c373e417f041d9f1e5b863f',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../symfony/cache',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'symfony/cache-contracts' => 
        array (
          'pretty_version' => 'v3.6.0',
          'version' => '3.6.0.0',
          'reference' => '5d68a57d66910405e5c0b63d6f0af941e66fc868',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../symfony/cache-contracts',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'symfony/cache-implementation' => 
        array (
          'dev_requirement' => true,
          'provided' => 
          array (
            0 => '1.1|2.0|3.0',
          ),
        ),
        'symfony/clock' => 
        array (
          'pretty_version' => 'v7.3.0',
          'version' => '7.3.0.0',
          'reference' => 'b81435fbd6648ea425d1ee96a2d8e68f4ceacd24',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../symfony/clock',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/console' => 
        array (
          'pretty_version' => 'v7.3.4',
          'version' => '7.3.4.0',
          'reference' => '2b9c5fafbac0399a20a2e82429e2bd735dcfb7db',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../symfony/console',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/css-selector' => 
        array (
          'pretty_version' => 'v7.3.0',
          'version' => '7.3.0.0',
          'reference' => '601a5ce9aaad7bf10797e3663faefce9e26c24e2',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../symfony/css-selector',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/deprecation-contracts' => 
        array (
          'pretty_version' => 'v3.6.0',
          'version' => '3.6.0.0',
          'reference' => '63afe740e99a13ba87ec199bb07bbdee937a5b62',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../symfony/deprecation-contracts',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/error-handler' => 
        array (
          'pretty_version' => 'v7.3.4',
          'version' => '7.3.4.0',
          'reference' => '99f81bc944ab8e5dae4f21b4ca9972698bbad0e4',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../symfony/error-handler',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/event-dispatcher' => 
        array (
          'pretty_version' => 'v7.3.3',
          'version' => '7.3.3.0',
          'reference' => 'b7dc69e71de420ac04bc9ab830cf3ffebba48191',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../symfony/event-dispatcher',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/event-dispatcher-contracts' => 
        array (
          'pretty_version' => 'v3.6.0',
          'version' => '3.6.0.0',
          'reference' => '59eb412e93815df44f05f342958efa9f46b1e586',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../symfony/event-dispatcher-contracts',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/event-dispatcher-implementation' => 
        array (
          'dev_requirement' => false,
          'provided' => 
          array (
            0 => '2.0|3.0',
          ),
        ),
        'symfony/filesystem' => 
        array (
          'pretty_version' => 'v7.3.2',
          'version' => '7.3.2.0',
          'reference' => 'edcbb768a186b5c3f25d0643159a787d3e63b7fd',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../symfony/filesystem',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'symfony/finder' => 
        array (
          'pretty_version' => 'v7.3.2',
          'version' => '7.3.2.0',
          'reference' => '2a6614966ba1074fa93dae0bc804227422df4dfe',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../symfony/finder',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/http-client' => 
        array (
          'pretty_version' => 'v7.3.4',
          'version' => '7.3.4.0',
          'reference' => '4b62871a01c49457cf2a8e560af7ee8a94b87a62',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../symfony/http-client',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'symfony/http-client-contracts' => 
        array (
          'pretty_version' => 'v3.6.0',
          'version' => '3.6.0.0',
          'reference' => '75d7043853a42837e68111812f4d964b01e5101c',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../symfony/http-client-contracts',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'symfony/http-client-implementation' => 
        array (
          'dev_requirement' => true,
          'provided' => 
          array (
            0 => '3.0',
          ),
        ),
        'symfony/http-foundation' => 
        array (
          'pretty_version' => 'v7.3.4',
          'version' => '7.3.4.0',
          'reference' => 'c061c7c18918b1b64268771aad04b40be41dd2e6',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../symfony/http-foundation',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/http-kernel' => 
        array (
          'pretty_version' => 'v7.3.4',
          'version' => '7.3.4.0',
          'reference' => 'b796dffea7821f035047235e076b60ca2446e3cf',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../symfony/http-kernel',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/mailer' => 
        array (
          'pretty_version' => 'v7.3.4',
          'version' => '7.3.4.0',
          'reference' => 'ab97ef2f7acf0216955f5845484235113047a31d',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../symfony/mailer',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/mime' => 
        array (
          'pretty_version' => 'v7.3.4',
          'version' => '7.3.4.0',
          'reference' => 'b1b828f69cbaf887fa835a091869e55df91d0e35',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../symfony/mime',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/options-resolver' => 
        array (
          'pretty_version' => 'v7.3.3',
          'version' => '7.3.3.0',
          'reference' => '0ff2f5c3df08a395232bbc3c2eb7e84912df911d',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../symfony/options-resolver',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'symfony/polyfill-ctype' => 
        array (
          'pretty_version' => 'v1.33.0',
          'version' => '1.33.0.0',
          'reference' => 'a3cc8b044a6ea513310cbd48ef7333b384945638',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../symfony/polyfill-ctype',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/polyfill-intl-grapheme' => 
        array (
          'pretty_version' => 'v1.33.0',
          'version' => '1.33.0.0',
          'reference' => '380872130d3a5dd3ace2f4010d95125fde5d5c70',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../symfony/polyfill-intl-grapheme',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/polyfill-intl-idn' => 
        array (
          'pretty_version' => 'v1.33.0',
          'version' => '1.33.0.0',
          'reference' => '9614ac4d8061dc257ecc64cba1b140873dce8ad3',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../symfony/polyfill-intl-idn',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/polyfill-intl-normalizer' => 
        array (
          'pretty_version' => 'v1.33.0',
          'version' => '1.33.0.0',
          'reference' => '3833d7255cc303546435cb650316bff708a1c75c',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../symfony/polyfill-intl-normalizer',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/polyfill-mbstring' => 
        array (
          'pretty_version' => 'v1.33.0',
          'version' => '1.33.0.0',
          'reference' => '6d857f4d76bd4b343eac26d6b539585d2bc56493',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../symfony/polyfill-mbstring',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/polyfill-php80' => 
        array (
          'pretty_version' => 'v1.33.0',
          'version' => '1.33.0.0',
          'reference' => '0cc9dd0f17f61d8131e7df6b84bd344899fe2608',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../symfony/polyfill-php80',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/polyfill-php81' => 
        array (
          'pretty_version' => 'v1.33.0',
          'version' => '1.33.0.0',
          'reference' => '4a4cfc2d253c21a5ad0e53071df248ed48c6ce5c',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../symfony/polyfill-php81',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'symfony/polyfill-php83' => 
        array (
          'pretty_version' => 'v1.33.0',
          'version' => '1.33.0.0',
          'reference' => '17f6f9a6b1735c0f163024d959f700cfbc5155e5',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../symfony/polyfill-php83',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/polyfill-php84' => 
        array (
          'pretty_version' => 'v1.33.0',
          'version' => '1.33.0.0',
          'reference' => 'd8ced4d875142b6a7426000426b8abc631d6b191',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../symfony/polyfill-php84',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/polyfill-php85' => 
        array (
          'pretty_version' => 'v1.33.0',
          'version' => '1.33.0.0',
          'reference' => 'd4e5fcd4ab3d998ab16c0db48e6cbb9a01993f91',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../symfony/polyfill-php85',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/polyfill-uuid' => 
        array (
          'pretty_version' => 'v1.33.0',
          'version' => '1.33.0.0',
          'reference' => '21533be36c24be3f4b1669c4725c7d1d2bab4ae2',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../symfony/polyfill-uuid',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/process' => 
        array (
          'pretty_version' => 'v7.3.4',
          'version' => '7.3.4.0',
          'reference' => 'f24f8f316367b30810810d4eb30c543d7003ff3b',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../symfony/process',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/routing' => 
        array (
          'pretty_version' => 'v7.3.4',
          'version' => '7.3.4.0',
          'reference' => '8dc648e159e9bac02b703b9fbd937f19ba13d07c',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../symfony/routing',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/service-contracts' => 
        array (
          'pretty_version' => 'v3.6.0',
          'version' => '3.6.0.0',
          'reference' => 'f021b05a130d35510bd6b25fe9053c2a8a15d5d4',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../symfony/service-contracts',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/stopwatch' => 
        array (
          'pretty_version' => 'v7.3.0',
          'version' => '7.3.0.0',
          'reference' => '5a49289e2b308214c8b9c2fda4ea454d8b8ad7cd',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../symfony/stopwatch',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'symfony/string' => 
        array (
          'pretty_version' => 'v7.3.4',
          'version' => '7.3.4.0',
          'reference' => 'f96476035142921000338bad71e5247fbc138872',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../symfony/string',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/translation' => 
        array (
          'pretty_version' => 'v7.3.4',
          'version' => '7.3.4.0',
          'reference' => 'ec25870502d0c7072d086e8ffba1420c85965174',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../symfony/translation',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/translation-contracts' => 
        array (
          'pretty_version' => 'v3.6.0',
          'version' => '3.6.0.0',
          'reference' => 'df210c7a2573f1913b2d17cc95f90f53a73d8f7d',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../symfony/translation-contracts',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/translation-implementation' => 
        array (
          'dev_requirement' => false,
          'provided' => 
          array (
            0 => '2.3|3.0',
          ),
        ),
        'symfony/uid' => 
        array (
          'pretty_version' => 'v7.3.1',
          'version' => '7.3.1.0',
          'reference' => 'a69f69f3159b852651a6bf45a9fdd149520525bb',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../symfony/uid',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/var-dumper' => 
        array (
          'pretty_version' => 'v7.3.4',
          'version' => '7.3.4.0',
          'reference' => 'b8abe7daf2730d07dfd4b2ee1cecbf0dd2fbdabb',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../symfony/var-dumper',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/var-exporter' => 
        array (
          'pretty_version' => 'v7.3.4',
          'version' => '7.3.4.0',
          'reference' => '0f020b544a30a7fe8ba972e53ee48a74c0bc87f4',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../symfony/var-exporter',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'symfony/yaml' => 
        array (
          'pretty_version' => 'v7.3.3',
          'version' => '7.3.3.0',
          'reference' => 'd4f4a66866fe2451f61296924767280ab5732d9d',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../symfony/yaml',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'theseer/tokenizer' => 
        array (
          'pretty_version' => '1.2.3',
          'version' => '1.2.3.0',
          'reference' => '737eda637ed5e28c3413cb1ebe8bb52cbf1ca7a2',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../theseer/tokenizer',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'tijsverkoyen/css-to-inline-styles' => 
        array (
          'pretty_version' => 'v2.3.0',
          'version' => '2.3.0.0',
          'reference' => '0d72ac1c00084279c1816675284073c5a337c20d',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../tijsverkoyen/css-to-inline-styles',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'vlucas/phpdotenv' => 
        array (
          'pretty_version' => 'v5.6.2',
          'version' => '5.6.2.0',
          'reference' => '24ac4c74f91ee2c193fa1aaa5c249cb0822809af',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../vlucas/phpdotenv',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'voku/portable-ascii' => 
        array (
          'pretty_version' => '2.0.3',
          'version' => '2.0.3.0',
          'reference' => 'b1d923f88091c6bf09699efcd7c8a1b1bfd7351d',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../voku/portable-ascii',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'webmozart/assert' => 
        array (
          'pretty_version' => '1.11.0',
          'version' => '1.11.0.0',
          'reference' => '11cb2199493b2f8a3b53e7f19068fc6aac760991',
          'type' => 'library',
          'install_path' => 'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\composer/../webmozart/assert',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
      ),
    ),
  ),
  'executedFilesHashes' => 
  array (
    'C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\larastan\\larastan\\bootstrap.php' => '28392079817075879815f110287690e80398fe5e',
    'phar://C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\phpstan\\phpstan\\phpstan.phar\\stubs\\runtime\\Attribute85.php' => '123dcd45f03f2463904087a66bfe2bc139760df0',
    'phar://C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\phpstan\\phpstan\\phpstan.phar\\stubs\\runtime\\ReflectionAttribute.php' => '0b4b78277eb6545955d2ce5e09bff28f1f8052c8',
    'phar://C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\phpstan\\phpstan\\phpstan.phar\\stubs\\runtime\\ReflectionIntersectionType.php' => 'a3e6299b87ee5d407dae7651758edfa11a74cb11',
    'phar://C:\\xampp\\htdocs\\homestay-system-131025\\vendor\\phpstan\\phpstan\\phpstan.phar\\stubs\\runtime\\ReflectionUnionType.php' => '1b349aa997a834faeafe05fa21bc31cae22bf2e2',
  ),
  'phpExtensions' => 
  array (
    0 => 'Core',
    1 => 'PDO',
    2 => 'Phar',
    3 => 'Reflection',
    4 => 'SPL',
    5 => 'SimpleXML',
    6 => 'bcmath',
    7 => 'bz2',
    8 => 'calendar',
    9 => 'ctype',
    10 => 'curl',
    11 => 'date',
    12 => 'dom',
    13 => 'exif',
    14 => 'fileinfo',
    15 => 'filter',
    16 => 'ftp',
    17 => 'gd',
    18 => 'gettext',
    19 => 'hash',
    20 => 'iconv',
    21 => 'intl',
    22 => 'json',
    23 => 'libxml',
    24 => 'mbstring',
    25 => 'mysqli',
    26 => 'mysqlnd',
    27 => 'openssl',
    28 => 'pcre',
    29 => 'pdo_mysql',
    30 => 'pdo_sqlite',
    31 => 'random',
    32 => 'readline',
    33 => 'session',
    34 => 'standard',
    35 => 'tokenizer',
    36 => 'xml',
    37 => 'xmlreader',
    38 => 'xmlwriter',
    39 => 'zip',
    40 => 'zlib',
  ),
  'stubFiles' => 
  array (
    'C:\\xampp\\htdocs\\homestay-system-131025\\build\\phpstan\\stubs\\laravel-stubs.php' => '4f74ecc57e25cb735604c32370d7fa6323e48ae2',
  ),
  'level' => 'max',
),
	'projectExtensionFiles' => array (
),
	'errorsCallback' => static function (): array { return array (
  'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Console\\Commands\\ValidateFactories.php' => 
  array (
    0 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Property App\\Console\\Commands\\ValidateFactories::$factories with generic class Illuminate\\Database\\Eloquent\\Factories\\Factory does not specify its types: TModel',
       'file' => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Console\\Commands\\ValidateFactories.php',
       'line' => 40,
       'canBeIgnored' => true,
       'filePath' => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Console\\Commands\\ValidateFactories.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 40,
       'nodeType' => 'PHPStan\\Node\\ClassPropertyNode',
       'identifier' => 'missingType.generics',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    1 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Console\\Commands\\ValidateFactories::validateFactoryStates() has parameter $factory with generic class Illuminate\\Database\\Eloquent\\Factories\\Factory but does not specify its types: TModel',
       'file' => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Console\\Commands\\ValidateFactories.php',
       'line' => 153,
       'canBeIgnored' => true,
       'filePath' => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Console\\Commands\\ValidateFactories.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 153,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.generics',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    2 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Call to function method_exists() with Illuminate\\Database\\Eloquent\\Factories\\Factory and \'make\' will always evaluate to true.',
       'file' => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Console\\Commands\\ValidateFactories.php',
       'line' => 189,
       'canBeIgnored' => true,
       'filePath' => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Console\\Commands\\ValidateFactories.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 189,
       'nodeType' => 'PhpParser\\Node\\Expr\\FuncCall',
       'identifier' => 'function.alreadyNarrowedType',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
  ),
  'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Console\\Commands\\ValidateModels.php' => 
  array (
    0 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Binary operation "+=" between (float|int) and mixed results in an error.',
       'file' => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Console\\Commands\\ValidateModels.php',
       'line' => 66,
       'canBeIgnored' => true,
       'filePath' => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Console\\Commands\\ValidateModels.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 66,
       'nodeType' => 'PhpParser\\Node\\Expr\\AssignOp\\Plus',
       'identifier' => 'assignOp.invalid',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    1 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Binary operation "+=" between (float|int) and mixed results in an error.',
       'file' => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Console\\Commands\\ValidateModels.php',
       'line' => 67,
       'canBeIgnored' => true,
       'filePath' => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Console\\Commands\\ValidateModels.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 67,
       'nodeType' => 'PhpParser\\Node\\Expr\\AssignOp\\Plus',
       'identifier' => 'assignOp.invalid',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    2 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Console\\Commands\\ValidateModels::validateSingleModel() return type has no value type specified in iterable type array.',
       'file' => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Console\\Commands\\ValidateModels.php',
       'line' => 76,
       'canBeIgnored' => true,
       'filePath' => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Console\\Commands\\ValidateModels.php',
       'traitFilePath' => NULL,
       'tip' => 'See: https://phpstan.org/blog/solving-phpstan-no-value-type-specified-in-iterable-type',
       'nodeLine' => 76,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.iterableValue',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    3 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Console\\Commands\\ValidateModels::validateModelInstantiation() should return Illuminate\\Database\\Eloquent\\Model|null but returns object.',
       'file' => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Console\\Commands\\ValidateModels.php',
       'line' => 112,
       'canBeIgnored' => true,
       'filePath' => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Console\\Commands\\ValidateModels.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 112,
       'nodeType' => 'PhpParser\\Node\\Stmt\\Return_',
       'identifier' => 'return.type',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    4 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Part $count (mixed) of encapsed string cannot be cast to string.',
       'file' => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Console\\Commands\\ValidateModels.php',
       'line' => 158,
       'canBeIgnored' => true,
       'filePath' => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Console\\Commands\\ValidateModels.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 158,
       'nodeType' => 'PhpParser\\Node\\Scalar\\InterpolatedString',
       'identifier' => 'encapsedStringPart.nonString',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    5 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Call to an undefined method object::make().',
       'file' => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Console\\Commands\\ValidateModels.php',
       'line' => 182,
       'canBeIgnored' => true,
       'filePath' => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Console\\Commands\\ValidateModels.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 182,
       'nodeType' => 'PhpParser\\Node\\Expr\\MethodCall',
       'identifier' => 'method.notFound',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
  ),
  'C:\\xampp\\htdocs\\homestay-system-131025\\build\\phpstan\\stubs\\laravel-stubs.php' => 
  array (
    0 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Function _ensure_string_array() has parameter $arr with no value type specified in iterable type array.',
       'file' => 'C:\\xampp\\htdocs\\homestay-system-131025\\build\\phpstan\\stubs\\laravel-stubs.php',
       'line' => 18,
       'canBeIgnored' => false,
       'filePath' => 'C:\\xampp\\htdocs\\homestay-system-131025\\build\\phpstan\\stubs\\laravel-stubs.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 18,
       'nodeType' => 'PHPStan\\Node\\InFunctionNode',
       'identifier' => 'missingType.iterableValue',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    1 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Function _ensure_string_array() return type has no value type specified in iterable type array.',
       'file' => 'C:\\xampp\\htdocs\\homestay-system-131025\\build\\phpstan\\stubs\\laravel-stubs.php',
       'line' => 18,
       'canBeIgnored' => false,
       'filePath' => 'C:\\xampp\\htdocs\\homestay-system-131025\\build\\phpstan\\stubs\\laravel-stubs.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 18,
       'nodeType' => 'PHPStan\\Node\\InFunctionNode',
       'identifier' => 'missingType.iterableValue',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
  ),
  'C:\\xampp\\htdocs\\homestay-system-131025\\config\\insights.php' => 
  array (
    0 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Class PHP_CodeSniffer\\Standards\\Generic\\Sniffs\\Files\\LineLengthSniff not found.',
       'file' => 'C:\\xampp\\htdocs\\homestay-system-131025\\config\\insights.php',
       'line' => 72,
       'canBeIgnored' => true,
       'filePath' => 'C:\\xampp\\htdocs\\homestay-system-131025\\config\\insights.php',
       'traitFilePath' => NULL,
       'tip' => 'Learn more at https://phpstan.org/user-guide/discovering-symbols',
       'nodeLine' => 72,
       'nodeType' => 'PhpParser\\Node\\Expr\\ClassConstFetch',
       'identifier' => 'class.notFound',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
  ),
  'C:\\xampp\\htdocs\\homestay-system-131025\\database\\factories\\AuditLogFactory.php' => 
  array (
    0 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method Database\\Factories\\AuditLogFactory::definition() return type with generic class Illuminate\\Database\\Eloquent\\Factories\\Factory does not specify its types: TModel',
       'file' => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\factories\\AuditLogFactory.php',
       'line' => 35,
       'canBeIgnored' => true,
       'filePath' => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\factories\\AuditLogFactory.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 35,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.generics',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    1 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Cannot cast mixed to string.',
       'file' => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\factories\\AuditLogFactory.php',
       'line' => 40,
       'canBeIgnored' => true,
       'filePath' => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\factories\\AuditLogFactory.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 40,
       'nodeType' => 'PhpParser\\Node\\Expr\\Cast\\String_',
       'identifier' => 'cast.string',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    2 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Cannot cast mixed to string.',
       'file' => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\factories\\AuditLogFactory.php',
       'line' => 41,
       'canBeIgnored' => true,
       'filePath' => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\factories\\AuditLogFactory.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 41,
       'nodeType' => 'PhpParser\\Node\\Expr\\Cast\\String_',
       'identifier' => 'cast.string',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
  ),
  'C:\\xampp\\htdocs\\homestay-system-131025\\database\\factories\\ClusterFactory.php' => 
  array (
    0 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Return type (array<string, mixed>) of method Database\\Factories\\ClusterFactory::definition() should be compatible with return type (array<model property of App\\Models\\Cluster, mixed>) of method Illuminate\\Database\\Eloquent\\Factories\\Factory<App\\Models\\Cluster>::definition()',
       'file' => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\factories\\ClusterFactory.php',
       'line' => 25,
       'canBeIgnored' => true,
       'filePath' => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\factories\\ClusterFactory.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 25,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'method.childReturnType',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    1 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Cannot cast mixed to string.',
       'file' => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\factories\\ClusterFactory.php',
       'line' => 44,
       'canBeIgnored' => true,
       'filePath' => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\factories\\ClusterFactory.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 44,
       'nodeType' => 'PhpParser\\Node\\Expr\\Cast\\String_',
       'identifier' => 'cast.string',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    2 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Cannot cast mixed to string.',
       'file' => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\factories\\ClusterFactory.php',
       'line' => 45,
       'canBeIgnored' => true,
       'filePath' => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\factories\\ClusterFactory.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 45,
       'nodeType' => 'PhpParser\\Node\\Expr\\Cast\\String_',
       'identifier' => 'cast.string',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    3 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Cannot cast mixed to string.',
       'file' => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\factories\\ClusterFactory.php',
       'line' => 92,
       'canBeIgnored' => true,
       'filePath' => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\factories\\ClusterFactory.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 92,
       'nodeType' => 'PhpParser\\Node\\Expr\\Cast\\String_',
       'identifier' => 'cast.string',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    4 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Binary operation "." between \'Kluster Eco-Tourism \' and mixed results in an error.',
       'file' => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\factories\\ClusterFactory.php',
       'line' => 106,
       'canBeIgnored' => true,
       'filePath' => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\factories\\ClusterFactory.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 106,
       'nodeType' => 'PhpParser\\Node\\Expr\\BinaryOp\\Concat',
       'identifier' => 'binaryOp.invalid',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    5 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Binary operation "." between \'Kluster homestay…\' and mixed results in an error.',
       'file' => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\factories\\ClusterFactory.php',
       'line' => 108,
       'canBeIgnored' => true,
       'filePath' => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\factories\\ClusterFactory.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 108,
       'nodeType' => 'PhpParser\\Node\\Expr\\BinaryOp\\Concat',
       'identifier' => 'binaryOp.invalid',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    6 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Binary operation "." between \'Kluster Warisan…\' and mixed results in an error.',
       'file' => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\factories\\ClusterFactory.php',
       'line' => 124,
       'canBeIgnored' => true,
       'filePath' => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\factories\\ClusterFactory.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 124,
       'nodeType' => 'PhpParser\\Node\\Expr\\BinaryOp\\Concat',
       'identifier' => 'binaryOp.invalid',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    7 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Binary operation "." between \'Kluster homestay…\' and mixed results in an error.',
       'file' => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\factories\\ClusterFactory.php',
       'line' => 126,
       'canBeIgnored' => true,
       'filePath' => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\factories\\ClusterFactory.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 126,
       'nodeType' => 'PhpParser\\Node\\Expr\\BinaryOp\\Concat',
       'identifier' => 'binaryOp.invalid',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    8 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Binary operation "." between \'Kluster Adventure…\' and mixed results in an error.',
       'file' => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\factories\\ClusterFactory.php',
       'line' => 142,
       'canBeIgnored' => true,
       'filePath' => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\factories\\ClusterFactory.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 142,
       'nodeType' => 'PhpParser\\Node\\Expr\\BinaryOp\\Concat',
       'identifier' => 'binaryOp.invalid',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    9 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Binary operation "." between \'Kluster homestay…\' and mixed results in an error.',
       'file' => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\factories\\ClusterFactory.php',
       'line' => 144,
       'canBeIgnored' => true,
       'filePath' => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\factories\\ClusterFactory.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 144,
       'nodeType' => 'PhpParser\\Node\\Expr\\BinaryOp\\Concat',
       'identifier' => 'binaryOp.invalid',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    10 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Binary operation "." between \'Kluster Marine…\' and mixed results in an error.',
       'file' => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\factories\\ClusterFactory.php',
       'line' => 160,
       'canBeIgnored' => true,
       'filePath' => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\factories\\ClusterFactory.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 160,
       'nodeType' => 'PhpParser\\Node\\Expr\\BinaryOp\\Concat',
       'identifier' => 'binaryOp.invalid',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    11 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Binary operation "." between \'Kluster homestay…\' and mixed results in an error.',
       'file' => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\factories\\ClusterFactory.php',
       'line' => 162,
       'canBeIgnored' => true,
       'filePath' => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\factories\\ClusterFactory.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 162,
       'nodeType' => 'PhpParser\\Node\\Expr\\BinaryOp\\Concat',
       'identifier' => 'binaryOp.invalid',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
  ),
  'C:\\xampp\\htdocs\\homestay-system-131025\\database\\factories\\CooperativeFactory.php' => 
  array (
    0 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Return type (array<string, mixed>) of method Database\\Factories\\CooperativeFactory::definition() should be compatible with return type (array<model property of App\\Models\\Cooperative, mixed>) of method Illuminate\\Database\\Eloquent\\Factories\\Factory<App\\Models\\Cooperative>::definition()',
       'file' => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\factories\\CooperativeFactory.php',
       'line' => 25,
       'canBeIgnored' => true,
       'filePath' => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\factories\\CooperativeFactory.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 25,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'method.childReturnType',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    1 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Cannot cast mixed to string.',
       'file' => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\factories\\CooperativeFactory.php',
       'line' => 41,
       'canBeIgnored' => true,
       'filePath' => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\factories\\CooperativeFactory.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 41,
       'nodeType' => 'PhpParser\\Node\\Expr\\Cast\\String_',
       'identifier' => 'cast.string',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    2 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Cannot cast mixed to string.',
       'file' => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\factories\\CooperativeFactory.php',
       'line' => 44,
       'canBeIgnored' => true,
       'filePath' => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\factories\\CooperativeFactory.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 44,
       'nodeType' => 'PhpParser\\Node\\Expr\\Cast\\String_',
       'identifier' => 'cast.string',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    3 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Binary operation "." between \'Koperasi…\' and mixed results in an error.',
       'file' => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\factories\\CooperativeFactory.php',
       'line' => 77,
       'canBeIgnored' => true,
       'filePath' => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\factories\\CooperativeFactory.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 77,
       'nodeType' => 'PhpParser\\Node\\Expr\\BinaryOp\\Concat',
       'identifier' => 'binaryOp.invalid',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    4 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Binary operation "." between \'Koperasi Warisan…\' and mixed results in an error.',
       'file' => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\factories\\CooperativeFactory.php',
       'line' => 94,
       'canBeIgnored' => true,
       'filePath' => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\factories\\CooperativeFactory.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 94,
       'nodeType' => 'PhpParser\\Node\\Expr\\BinaryOp\\Concat',
       'identifier' => 'binaryOp.invalid',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
  ),
  'C:\\xampp\\htdocs\\homestay-system-131025\\database\\factories\\HomestayFactory.php' => 
  array (
    0 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Return type (array<string, mixed>) of method Database\\Factories\\HomestayFactory::definition() should be compatible with return type (array<model property of App\\Models\\Homestay, mixed>) of method Illuminate\\Database\\Eloquent\\Factories\\Factory<App\\Models\\Homestay>::definition()',
       'file' => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\factories\\HomestayFactory.php',
       'line' => 27,
       'canBeIgnored' => true,
       'filePath' => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\factories\\HomestayFactory.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 27,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'method.childReturnType',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
  ),
  'C:\\xampp\\htdocs\\homestay-system-131025\\database\\factories\\ImportFactory.php' => 
  array (
    0 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method Database\\Factories\\ImportFactory::definition() return type with generic class Illuminate\\Database\\Eloquent\\Factories\\Factory does not specify its types: TModel',
       'file' => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\factories\\ImportFactory.php',
       'line' => 36,
       'canBeIgnored' => true,
       'filePath' => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\factories\\ImportFactory.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 36,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.generics',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    1 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Cannot cast mixed to string.',
       'file' => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\factories\\ImportFactory.php',
       'line' => 40,
       'canBeIgnored' => true,
       'filePath' => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\factories\\ImportFactory.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 40,
       'nodeType' => 'PhpParser\\Node\\Expr\\Cast\\String_',
       'identifier' => 'cast.string',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    2 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Cannot cast mixed to string.',
       'file' => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\factories\\ImportFactory.php',
       'line' => 51,
       'canBeIgnored' => true,
       'filePath' => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\factories\\ImportFactory.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 51,
       'nodeType' => 'PhpParser\\Node\\Expr\\Cast\\String_',
       'identifier' => 'cast.string',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    3 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Cannot cast mixed to int.',
       'file' => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\factories\\ImportFactory.php',
       'line' => 107,
       'canBeIgnored' => true,
       'filePath' => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\factories\\ImportFactory.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 107,
       'nodeType' => 'PhpParser\\Node\\Expr\\Cast\\Int_',
       'identifier' => 'cast.int',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    4 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Cannot cast mixed to int.',
       'file' => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\factories\\ImportFactory.php',
       'line' => 122,
       'canBeIgnored' => true,
       'filePath' => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\factories\\ImportFactory.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 122,
       'nodeType' => 'PhpParser\\Node\\Expr\\Cast\\Int_',
       'identifier' => 'cast.int',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
  ),
  'C:\\xampp\\htdocs\\homestay-system-131025\\database\\factories\\LaporanTerjadualFactory.php' => 
  array (
    0 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Return type (array<string, mixed>) of method Database\\Factories\\LaporanTerjadualFactory::definition() should be compatible with return type (array<model property of App\\Models\\LaporanTerjadual, mixed>) of method Illuminate\\Database\\Eloquent\\Factories\\Factory<App\\Models\\LaporanTerjadual>::definition()',
       'file' => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\factories\\LaporanTerjadualFactory.php',
       'line' => 26,
       'canBeIgnored' => true,
       'filePath' => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\factories\\LaporanTerjadualFactory.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 26,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'method.childReturnType',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
  ),
  'C:\\xampp\\htdocs\\homestay-system-131025\\database\\factories\\PerformanceFactory.php' => 
  array (
    0 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Return type (array<string, mixed>) of method Database\\Factories\\PerformanceFactory::definition() should be compatible with return type (array<model property of App\\Models\\Performance, mixed>) of method Illuminate\\Database\\Eloquent\\Factories\\Factory<App\\Models\\Performance>::definition()',
       'file' => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\factories\\PerformanceFactory.php',
       'line' => 26,
       'canBeIgnored' => true,
       'filePath' => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\factories\\PerformanceFactory.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 26,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'method.childReturnType',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    1 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method Database\\Factories\\PerformanceFactory::monthlySeries() should return list<array<string, mixed>> but returns non-empty-list<array<mixed>>.',
       'file' => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\factories\\PerformanceFactory.php',
       'line' => 261,
       'canBeIgnored' => true,
       'filePath' => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\factories\\PerformanceFactory.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 261,
       'nodeType' => 'PhpParser\\Node\\Stmt\\Return_',
       'identifier' => 'return.type',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
  ),
  'C:\\xampp\\htdocs\\homestay-system-131025\\database\\factories\\SystemSettingFactory.php' => 
  array (
    0 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Return type (array<string, mixed>) of method Database\\Factories\\SystemSettingFactory::definition() should be compatible with return type (array<model property of App\\Models\\SystemSetting, mixed>) of method Illuminate\\Database\\Eloquent\\Factories\\Factory<App\\Models\\SystemSetting>::definition()',
       'file' => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\factories\\SystemSettingFactory.php',
       'line' => 25,
       'canBeIgnored' => true,
       'filePath' => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\factories\\SystemSettingFactory.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 25,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'method.childReturnType',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    1 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Cannot cast mixed to string.',
       'file' => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\factories\\SystemSettingFactory.php',
       'line' => 37,
       'canBeIgnored' => true,
       'filePath' => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\factories\\SystemSettingFactory.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 37,
       'nodeType' => 'PhpParser\\Node\\Expr\\Cast\\String_',
       'identifier' => 'cast.string',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    2 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Cannot cast mixed to string.',
       'file' => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\factories\\SystemSettingFactory.php',
       'line' => 89,
       'canBeIgnored' => true,
       'filePath' => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\factories\\SystemSettingFactory.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 89,
       'nodeType' => 'PhpParser\\Node\\Expr\\Cast\\String_',
       'identifier' => 'cast.string',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    3 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Cannot cast mixed to string.',
       'file' => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\factories\\SystemSettingFactory.php',
       'line' => 109,
       'canBeIgnored' => true,
       'filePath' => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\factories\\SystemSettingFactory.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 109,
       'nodeType' => 'PhpParser\\Node\\Expr\\Cast\\String_',
       'identifier' => 'cast.string',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
  ),
); },
	'locallyIgnoredErrorsCallback' => static function (): array { return array (
  'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\AuditLog.php' => 
  array (
    0 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Class App\\Models\\AuditLog uses generic trait Illuminate\\Database\\Eloquent\\Factories\\HasFactory but does not specify its types: TModel',
       'file' => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\AuditLog.php',
       'line' => 62,
       'canBeIgnored' => true,
       'filePath' => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\AuditLog.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 62,
       'nodeType' => 'PhpParser\\Node\\Stmt\\TraitUse',
       'identifier' => 'missingType.generics',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    1 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Models\\AuditLog::user() return type with generic class Illuminate\\Database\\Eloquent\\Relations\\BelongsTo does not specify its types: TRelatedModel, TDeclaringModel',
       'file' => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\AuditLog.php',
       'line' => 107,
       'canBeIgnored' => true,
       'filePath' => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\AuditLog.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 107,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.generics',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
  ),
  'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\Cluster.php' => 
  array (
    0 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Class App\\Models\\Cluster uses generic trait Illuminate\\Database\\Eloquent\\Factories\\HasFactory but does not specify its types: TModel',
       'file' => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\Cluster.php',
       'line' => 35,
       'canBeIgnored' => true,
       'filePath' => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\Cluster.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 35,
       'nodeType' => 'PhpParser\\Node\\Stmt\\TraitUse',
       'identifier' => 'missingType.generics',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    1 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Models\\Cluster::homestays() should return Illuminate\\Database\\Eloquent\\Relations\\HasMany<App\\Models\\Homestay, App\\Models\\Cluster> but returns Illuminate\\Database\\Eloquent\\Relations\\HasMany<App\\Models\\Homestay, $this(App\\Models\\Cluster)>.',
       'file' => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\Cluster.php',
       'line' => 75,
       'canBeIgnored' => true,
       'filePath' => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\Cluster.php',
       'traitFilePath' => NULL,
       'tip' => 'Template type TDeclaringModel on class Illuminate\\Database\\Eloquent\\Relations\\HasMany is not covariant. Learn more: <fg=cyan>https://phpstan.org/blog/whats-up-with-template-covariant</>',
       'nodeLine' => 75,
       'nodeType' => 'PhpParser\\Node\\Stmt\\Return_',
       'identifier' => 'return.type',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    2 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Parameter #1 $column of method Illuminate\\Database\\Eloquent\\Builder<Illuminate\\Database\\Eloquent\\Model>::where() expects array<int|model property of Illuminate\\Database\\Eloquent\\Model, mixed>|(Closure(Illuminate\\Database\\Eloquent\\Builder<Illuminate\\Database\\Eloquent\\Model>): Illuminate\\Database\\Eloquent\\Builder<Illuminate\\Database\\Eloquent\\Model>)|(Closure(Illuminate\\Database\\Eloquent\\Builder<Illuminate\\Database\\Eloquent\\Model>): void)|Illuminate\\Contracts\\Database\\Query\\Expression|model property of Illuminate\\Database\\Eloquent\\Model, \'status\' given.',
       'file' => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\Cluster.php',
       'line' => 101,
       'canBeIgnored' => true,
       'filePath' => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\Cluster.php',
       'traitFilePath' => NULL,
       'tip' => 'Type #5 from the union: The given string should be a property of Illuminate\\Database\\Eloquent\\Model, status given.',
       'nodeLine' => 101,
       'nodeType' => 'PhpParser\\Node\\Expr\\MethodCall',
       'identifier' => 'argument.type',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
  ),
  'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\Cooperative.php' => 
  array (
    0 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Class App\\Models\\Cooperative uses generic trait Illuminate\\Database\\Eloquent\\Factories\\HasFactory but does not specify its types: TModel',
       'file' => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\Cooperative.php',
       'line' => 35,
       'canBeIgnored' => true,
       'filePath' => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\Cooperative.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 35,
       'nodeType' => 'PhpParser\\Node\\Stmt\\TraitUse',
       'identifier' => 'missingType.generics',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    1 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Models\\Cooperative::homestays() should return Illuminate\\Database\\Eloquent\\Relations\\HasMany<App\\Models\\Homestay, App\\Models\\Cooperative> but returns Illuminate\\Database\\Eloquent\\Relations\\HasMany<App\\Models\\Homestay, $this(App\\Models\\Cooperative)>.',
       'file' => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\Cooperative.php',
       'line' => 75,
       'canBeIgnored' => true,
       'filePath' => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\Cooperative.php',
       'traitFilePath' => NULL,
       'tip' => 'Template type TDeclaringModel on class Illuminate\\Database\\Eloquent\\Relations\\HasMany is not covariant. Learn more: <fg=cyan>https://phpstan.org/blog/whats-up-with-template-covariant</>',
       'nodeLine' => 75,
       'nodeType' => 'PhpParser\\Node\\Stmt\\Return_',
       'identifier' => 'return.type',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    2 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Parameter #1 $column of method Illuminate\\Database\\Eloquent\\Builder<Illuminate\\Database\\Eloquent\\Model>::where() expects array<int|model property of Illuminate\\Database\\Eloquent\\Model, mixed>|(Closure(Illuminate\\Database\\Eloquent\\Builder<Illuminate\\Database\\Eloquent\\Model>): Illuminate\\Database\\Eloquent\\Builder<Illuminate\\Database\\Eloquent\\Model>)|(Closure(Illuminate\\Database\\Eloquent\\Builder<Illuminate\\Database\\Eloquent\\Model>): void)|Illuminate\\Contracts\\Database\\Query\\Expression|model property of Illuminate\\Database\\Eloquent\\Model, \'status\' given.',
       'file' => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\Cooperative.php',
       'line' => 101,
       'canBeIgnored' => true,
       'filePath' => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\Cooperative.php',
       'traitFilePath' => NULL,
       'tip' => 'Type #5 from the union: The given string should be a property of Illuminate\\Database\\Eloquent\\Model, status given.',
       'nodeLine' => 101,
       'nodeType' => 'PhpParser\\Node\\Expr\\MethodCall',
       'identifier' => 'argument.type',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
  ),
  'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\Homestay.php' => 
  array (
    0 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Class App\\Models\\Homestay uses generic trait Illuminate\\Database\\Eloquent\\Factories\\HasFactory but does not specify its types: TModel',
       'file' => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\Homestay.php',
       'line' => 46,
       'canBeIgnored' => true,
       'filePath' => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\Homestay.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 46,
       'nodeType' => 'PhpParser\\Node\\Stmt\\TraitUse',
       'identifier' => 'missingType.generics',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    1 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Models\\Homestay::cooperative() should return Illuminate\\Database\\Eloquent\\Relations\\BelongsTo<App\\Models\\Cooperative, App\\Models\\Homestay> but returns Illuminate\\Database\\Eloquent\\Relations\\BelongsTo<App\\Models\\Cooperative, $this(App\\Models\\Homestay)>.',
       'file' => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\Homestay.php',
       'line' => 93,
       'canBeIgnored' => true,
       'filePath' => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\Homestay.php',
       'traitFilePath' => NULL,
       'tip' => 'Template type TDeclaringModel on class Illuminate\\Database\\Eloquent\\Relations\\BelongsTo is not covariant. Learn more: <fg=cyan>https://phpstan.org/blog/whats-up-with-template-covariant</>',
       'nodeLine' => 93,
       'nodeType' => 'PhpParser\\Node\\Stmt\\Return_',
       'identifier' => 'return.type',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    2 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Models\\Homestay::cluster() should return Illuminate\\Database\\Eloquent\\Relations\\BelongsTo<App\\Models\\Cluster, App\\Models\\Homestay> but returns Illuminate\\Database\\Eloquent\\Relations\\BelongsTo<App\\Models\\Cluster, $this(App\\Models\\Homestay)>.',
       'file' => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\Homestay.php',
       'line' => 104,
       'canBeIgnored' => true,
       'filePath' => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\Homestay.php',
       'traitFilePath' => NULL,
       'tip' => 'Template type TDeclaringModel on class Illuminate\\Database\\Eloquent\\Relations\\BelongsTo is not covariant. Learn more: <fg=cyan>https://phpstan.org/blog/whats-up-with-template-covariant</>',
       'nodeLine' => 104,
       'nodeType' => 'PhpParser\\Node\\Stmt\\Return_',
       'identifier' => 'return.type',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    3 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Models\\Homestay::performances() should return Illuminate\\Database\\Eloquent\\Relations\\HasMany<App\\Models\\Performance, App\\Models\\Homestay> but returns Illuminate\\Database\\Eloquent\\Relations\\HasMany<App\\Models\\Performance, $this(App\\Models\\Homestay)>.',
       'file' => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\Homestay.php',
       'line' => 115,
       'canBeIgnored' => true,
       'filePath' => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\Homestay.php',
       'traitFilePath' => NULL,
       'tip' => 'Template type TDeclaringModel on class Illuminate\\Database\\Eloquent\\Relations\\HasMany is not covariant. Learn more: <fg=cyan>https://phpstan.org/blog/whats-up-with-template-covariant</>',
       'nodeLine' => 115,
       'nodeType' => 'PhpParser\\Node\\Stmt\\Return_',
       'identifier' => 'return.type',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
  ),
  'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\Import.php' => 
  array (
    0 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Class App\\Models\\Import uses generic trait Illuminate\\Database\\Eloquent\\Factories\\HasFactory but does not specify its types: TModel',
       'file' => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\Import.php',
       'line' => 41,
       'canBeIgnored' => true,
       'filePath' => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\Import.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 41,
       'nodeType' => 'PhpParser\\Node\\Stmt\\TraitUse',
       'identifier' => 'missingType.generics',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    1 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Models\\Import::user() should return Illuminate\\Database\\Eloquent\\Relations\\BelongsTo<App\\Models\\User, App\\Models\\Import> but returns Illuminate\\Database\\Eloquent\\Relations\\BelongsTo<App\\Models\\User, $this(App\\Models\\Import)>.',
       'file' => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\Import.php',
       'line' => 89,
       'canBeIgnored' => true,
       'filePath' => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\Import.php',
       'traitFilePath' => NULL,
       'tip' => 'Template type TDeclaringModel on class Illuminate\\Database\\Eloquent\\Relations\\BelongsTo is not covariant. Learn more: <fg=cyan>https://phpstan.org/blog/whats-up-with-template-covariant</>',
       'nodeLine' => 89,
       'nodeType' => 'PhpParser\\Node\\Stmt\\Return_',
       'identifier' => 'return.type',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
  ),
  'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\LaporanTerjadual.php' => 
  array (
    0 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Class App\\Models\\LaporanTerjadual uses generic trait Illuminate\\Database\\Eloquent\\Factories\\HasFactory but does not specify its types: TModel',
       'file' => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\LaporanTerjadual.php',
       'line' => 42,
       'canBeIgnored' => true,
       'filePath' => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\LaporanTerjadual.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 42,
       'nodeType' => 'PhpParser\\Node\\Stmt\\TraitUse',
       'identifier' => 'missingType.generics',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    1 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Models\\LaporanTerjadual::user() should return Illuminate\\Database\\Eloquent\\Relations\\BelongsTo<App\\Models\\User, App\\Models\\LaporanTerjadual> but returns Illuminate\\Database\\Eloquent\\Relations\\BelongsTo<App\\Models\\User, $this(App\\Models\\LaporanTerjadual)>.',
       'file' => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\LaporanTerjadual.php',
       'line' => 89,
       'canBeIgnored' => true,
       'filePath' => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\LaporanTerjadual.php',
       'traitFilePath' => NULL,
       'tip' => 'Template type TDeclaringModel on class Illuminate\\Database\\Eloquent\\Relations\\BelongsTo is not covariant. Learn more: <fg=cyan>https://phpstan.org/blog/whats-up-with-template-covariant</>',
       'nodeLine' => 89,
       'nodeType' => 'PhpParser\\Node\\Stmt\\Return_',
       'identifier' => 'return.type',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
  ),
  'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\Performance.php' => 
  array (
    0 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Class App\\Models\\Performance uses generic trait Illuminate\\Database\\Eloquent\\Factories\\HasFactory but does not specify its types: TModel',
       'file' => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\Performance.php',
       'line' => 39,
       'canBeIgnored' => true,
       'filePath' => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\Performance.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 39,
       'nodeType' => 'PhpParser\\Node\\Stmt\\TraitUse',
       'identifier' => 'missingType.generics',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    1 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Models\\Performance::homestay() should return Illuminate\\Database\\Eloquent\\Relations\\BelongsTo<App\\Models\\Homestay, App\\Models\\Performance> but returns Illuminate\\Database\\Eloquent\\Relations\\BelongsTo<App\\Models\\Homestay, $this(App\\Models\\Performance)>.',
       'file' => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\Performance.php',
       'line' => 84,
       'canBeIgnored' => true,
       'filePath' => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\Performance.php',
       'traitFilePath' => NULL,
       'tip' => 'Template type TDeclaringModel on class Illuminate\\Database\\Eloquent\\Relations\\BelongsTo is not covariant. Learn more: <fg=cyan>https://phpstan.org/blog/whats-up-with-template-covariant</>',
       'nodeLine' => 84,
       'nodeType' => 'PhpParser\\Node\\Stmt\\Return_',
       'identifier' => 'return.type',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    2 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Parameter #1 $column of method Illuminate\\Database\\Eloquent\\Builder<Illuminate\\Database\\Eloquent\\Model>::where() expects array<int|model property of Illuminate\\Database\\Eloquent\\Model, mixed>|(Closure(Illuminate\\Database\\Eloquent\\Builder<Illuminate\\Database\\Eloquent\\Model>): Illuminate\\Database\\Eloquent\\Builder<Illuminate\\Database\\Eloquent\\Model>)|(Closure(Illuminate\\Database\\Eloquent\\Builder<Illuminate\\Database\\Eloquent\\Model>): void)|Illuminate\\Contracts\\Database\\Query\\Expression|model property of Illuminate\\Database\\Eloquent\\Model, \'negeri\' given.',
       'file' => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\Performance.php',
       'line' => 186,
       'canBeIgnored' => true,
       'filePath' => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\Performance.php',
       'traitFilePath' => NULL,
       'tip' => 'Type #5 from the union: The given string should be a property of Illuminate\\Database\\Eloquent\\Model, negeri given.',
       'nodeLine' => 186,
       'nodeType' => 'PhpParser\\Node\\Expr\\MethodCall',
       'identifier' => 'argument.type',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
  ),
  'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\SystemSetting.php' => 
  array (
    0 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Class App\\Models\\SystemSetting uses generic trait Illuminate\\Database\\Eloquent\\Factories\\HasFactory but does not specify its types: TModel',
       'file' => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\SystemSetting.php',
       'line' => 32,
       'canBeIgnored' => true,
       'filePath' => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\SystemSetting.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 32,
       'nodeType' => 'PhpParser\\Node\\Stmt\\TraitUse',
       'identifier' => 'missingType.generics',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
  ),
  'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\User.php' => 
  array (
    0 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Class App\\Models\\User uses generic trait Illuminate\\Database\\Eloquent\\Factories\\HasFactory but does not specify its types: TModel',
       'file' => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\User.php',
       'line' => 43,
       'canBeIgnored' => true,
       'filePath' => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\User.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 43,
       'nodeType' => 'PhpParser\\Node\\Stmt\\TraitUse',
       'identifier' => 'missingType.generics',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    1 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Models\\User::cooperative() should return Illuminate\\Database\\Eloquent\\Relations\\BelongsTo<App\\Models\\Cooperative, App\\Models\\User> but returns Illuminate\\Database\\Eloquent\\Relations\\BelongsTo<App\\Models\\Cooperative, $this(App\\Models\\User)>.',
       'file' => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\User.php',
       'line' => 105,
       'canBeIgnored' => true,
       'filePath' => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\User.php',
       'traitFilePath' => NULL,
       'tip' => 'Template type TDeclaringModel on class Illuminate\\Database\\Eloquent\\Relations\\BelongsTo is not covariant. Learn more: <fg=cyan>https://phpstan.org/blog/whats-up-with-template-covariant</>',
       'nodeLine' => 105,
       'nodeType' => 'PhpParser\\Node\\Stmt\\Return_',
       'identifier' => 'return.type',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    2 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Models\\User::imports() should return Illuminate\\Database\\Eloquent\\Relations\\HasMany<App\\Models\\Import, App\\Models\\User> but returns Illuminate\\Database\\Eloquent\\Relations\\HasMany<App\\Models\\Import, $this(App\\Models\\User)>.',
       'file' => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\User.php',
       'line' => 116,
       'canBeIgnored' => true,
       'filePath' => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\User.php',
       'traitFilePath' => NULL,
       'tip' => 'Template type TDeclaringModel on class Illuminate\\Database\\Eloquent\\Relations\\HasMany is not covariant. Learn more: <fg=cyan>https://phpstan.org/blog/whats-up-with-template-covariant</>',
       'nodeLine' => 116,
       'nodeType' => 'PhpParser\\Node\\Stmt\\Return_',
       'identifier' => 'return.type',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    3 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Models\\User::auditLogs() should return Illuminate\\Database\\Eloquent\\Relations\\HasMany<App\\Models\\AuditLog, App\\Models\\User> but returns Illuminate\\Database\\Eloquent\\Relations\\HasMany<App\\Models\\AuditLog, $this(App\\Models\\User)>.',
       'file' => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\User.php',
       'line' => 127,
       'canBeIgnored' => true,
       'filePath' => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\User.php',
       'traitFilePath' => NULL,
       'tip' => 'Template type TDeclaringModel on class Illuminate\\Database\\Eloquent\\Relations\\HasMany is not covariant. Learn more: <fg=cyan>https://phpstan.org/blog/whats-up-with-template-covariant</>',
       'nodeLine' => 127,
       'nodeType' => 'PhpParser\\Node\\Stmt\\Return_',
       'identifier' => 'return.type',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    4 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Models\\User::laporanTerjadual() should return Illuminate\\Database\\Eloquent\\Relations\\HasMany<App\\Models\\LaporanTerjadual, App\\Models\\User> but returns Illuminate\\Database\\Eloquent\\Relations\\HasMany<App\\Models\\LaporanTerjadual, $this(App\\Models\\User)>.',
       'file' => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\User.php',
       'line' => 138,
       'canBeIgnored' => true,
       'filePath' => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\User.php',
       'traitFilePath' => NULL,
       'tip' => 'Template type TDeclaringModel on class Illuminate\\Database\\Eloquent\\Relations\\HasMany is not covariant. Learn more: <fg=cyan>https://phpstan.org/blog/whats-up-with-template-covariant</>',
       'nodeLine' => 138,
       'nodeType' => 'PhpParser\\Node\\Stmt\\Return_',
       'identifier' => 'return.type',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
  ),
); },
	'linesToIgnore' => array (
  'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\AuditLog.php' => 
  array (
    'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\AuditLog.php' => 
    array (
      62 => NULL,
      107 => NULL,
    ),
  ),
  'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\Cluster.php' => 
  array (
    'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\Cluster.php' => 
    array (
      35 => NULL,
      75 => NULL,
      101 => NULL,
    ),
  ),
  'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\Cooperative.php' => 
  array (
    'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\Cooperative.php' => 
    array (
      35 => NULL,
      75 => NULL,
      101 => NULL,
    ),
  ),
  'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\Homestay.php' => 
  array (
    'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\Homestay.php' => 
    array (
      46 => NULL,
      93 => NULL,
      104 => NULL,
      115 => NULL,
    ),
  ),
  'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\Import.php' => 
  array (
    'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\Import.php' => 
    array (
      41 => NULL,
      89 => NULL,
    ),
  ),
  'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\LaporanTerjadual.php' => 
  array (
    'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\LaporanTerjadual.php' => 
    array (
      42 => NULL,
      89 => NULL,
    ),
  ),
  'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\Performance.php' => 
  array (
    'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\Performance.php' => 
    array (
      39 => NULL,
      84 => NULL,
      186 => NULL,
    ),
  ),
  'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\SystemSetting.php' => 
  array (
    'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\SystemSetting.php' => 
    array (
      32 => NULL,
    ),
  ),
  'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\User.php' => 
  array (
    'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\User.php' => 
    array (
      43 => NULL,
      105 => NULL,
      116 => NULL,
      127 => NULL,
      138 => NULL,
    ),
  ),
),
	'unmatchedLineIgnores' => array (
),
	'collectedDataCallback' => static function (): array { return array (
  'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\AuditLog.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Models\\AuditLog',
        1 => 'getChangesAttribute',
        2 => 'App\\Models\\AuditLog',
      ),
      1 => 
      array (
        0 => 'App\\Models\\AuditLog',
        1 => 'casts',
        2 => 'App\\Models\\AuditLog',
      ),
    ),
    'PHPStan\\Rules\\DeadCode\\PossiblyPureStaticCallCollector' => 
    array (
      0 => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Builder',
        1 => 'create',
        2 => 289,
      ),
      1 => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Builder',
        1 => 'create',
        2 => 308,
      ),
      2 => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Builder',
        1 => 'create',
        2 => 325,
      ),
      3 => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Builder',
        1 => 'create',
        2 => 344,
      ),
      4 => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Builder',
        1 => 'create',
        2 => 365,
      ),
    ),
    'PHPStan\\Rules\\Traits\\TraitUseCollector' => 
    array (
      0 => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
      ),
    ),
  ),
  'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\Cluster.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Models\\Cluster',
        1 => 'casts',
        2 => 'App\\Models\\Cluster',
      ),
    ),
    'PHPStan\\Rules\\Traits\\TraitUseCollector' => 
    array (
      0 => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
        1 => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
      ),
    ),
  ),
  'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\Concerns\\HandlesScopedSettings.php' => 
  array (
    'PHPStan\\Rules\\Traits\\TraitDeclarationCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Models\\Concerns\\HandlesScopedSettings',
        1 => 12,
      ),
    ),
  ),
  'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\Concerns\\HasUserAuthorization.php' => 
  array (
    'PHPStan\\Rules\\Traits\\TraitDeclarationCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Models\\Concerns\\HasUserAuthorization',
        1 => 16,
      ),
    ),
  ),
  'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\Concerns\\ManagesSystemSettings.php' => 
  array (
    'PHPStan\\Rules\\Traits\\TraitDeclarationCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Models\\Concerns\\ManagesSystemSettings',
        1 => 12,
      ),
    ),
  ),
  'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\Concerns\\ValidatesPerformanceData.php' => 
  array (
    'PHPStan\\Rules\\Traits\\TraitDeclarationCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Models\\Concerns\\ValidatesPerformanceData',
        1 => 13,
      ),
    ),
  ),
  'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\Cooperative.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Models\\Cooperative',
        1 => 'casts',
        2 => 'App\\Models\\Cooperative',
      ),
    ),
    'PHPStan\\Rules\\Traits\\TraitUseCollector' => 
    array (
      0 => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
        1 => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
      ),
    ),
  ),
  'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\Homestay.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Models\\Homestay',
        1 => 'casts',
        2 => 'App\\Models\\Homestay',
      ),
    ),
    'PHPStan\\Rules\\Traits\\TraitUseCollector' => 
    array (
      0 => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
        1 => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
      ),
    ),
  ),
  'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\Import.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Models\\Import',
        1 => 'getIsCompletedAttribute',
        2 => 'App\\Models\\Import',
      ),
      1 => 
      array (
        0 => 'App\\Models\\Import',
        1 => 'getIsFailedAttribute',
        2 => 'App\\Models\\Import',
      ),
      2 => 
      array (
        0 => 'App\\Models\\Import',
        1 => 'getIsProcessingAttribute',
        2 => 'App\\Models\\Import',
      ),
      3 => 
      array (
        0 => 'App\\Models\\Import',
        1 => 'casts',
        2 => 'App\\Models\\Import',
      ),
    ),
    'PHPStan\\Rules\\Traits\\TraitUseCollector' => 
    array (
      0 => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
      ),
    ),
  ),
  'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\LaporanTerjadual.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Models\\LaporanTerjadual',
        1 => 'getIsActiveAttribute',
        2 => 'App\\Models\\LaporanTerjadual',
      ),
      1 => 
      array (
        0 => 'App\\Models\\LaporanTerjadual',
        1 => 'casts',
        2 => 'App\\Models\\LaporanTerjadual',
      ),
    ),
    'PHPStan\\Rules\\Traits\\TraitUseCollector' => 
    array (
      0 => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
      ),
    ),
  ),
  'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\Performance.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Models\\Performance',
        1 => 'getTotalPelawatAttribute',
        2 => 'App\\Models\\Performance',
      ),
      1 => 
      array (
        0 => 'App\\Models\\Performance',
        1 => 'getBulanTahunAttribute',
        2 => 'App\\Models\\Performance',
      ),
      2 => 
      array (
        0 => 'App\\Models\\Performance',
        1 => 'casts',
        2 => 'App\\Models\\Performance',
      ),
    ),
    'PHPStan\\Rules\\Traits\\TraitUseCollector' => 
    array (
      0 => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
        1 => 'App\\Models\\Concerns\\ValidatesPerformanceData',
      ),
    ),
  ),
  'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\SystemSetting.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Models\\SystemSetting',
        1 => 'casts',
        2 => 'App\\Models\\SystemSetting',
      ),
      1 => 
      array (
        0 => 'App\\Models\\SystemSetting',
        1 => 'getIsGlobalAttribute',
        2 => 'App\\Models\\SystemSetting',
      ),
    ),
    'PHPStan\\Rules\\Traits\\TraitUseCollector' => 
    array (
      0 => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
      ),
    ),
  ),
  'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\User.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Models\\User',
        1 => 'casts',
        2 => 'App\\Models\\User',
      ),
    ),
    'PHPStan\\Rules\\Traits\\TraitUseCollector' => 
    array (
      0 => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
        1 => 'Spatie\\Permission\\Traits\\HasRoles',
        2 => 'Illuminate\\Notifications\\Notifiable',
      ),
    ),
  ),
  'C:\\xampp\\htdocs\\homestay-system-131025\\database\\factories\\ImportFactory.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'Database\\Factories\\ImportFactory',
        1 => 'getColumnsForType',
        2 => 'Database\\Factories\\ImportFactory',
      ),
    ),
  ),
  'C:\\xampp\\htdocs\\homestay-system-131025\\database\\seeders\\PerformanceSeeder.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'Database\\Seeders\\PerformanceSeeder',
        1 => 'getSeasonalMultiplier',
        2 => 'Database\\Seeders\\PerformanceSeeder',
      ),
      1 => 
      array (
        0 => 'Database\\Seeders\\PerformanceSeeder',
        1 => 'getNegeriMultiplier',
        2 => 'Database\\Seeders\\PerformanceSeeder',
      ),
      2 => 
      array (
        0 => 'Database\\Seeders\\PerformanceSeeder',
        1 => 'getCovidMultiplier',
        2 => 'Database\\Seeders\\PerformanceSeeder',
      ),
    ),
  ),
  'C:\\xampp\\htdocs\\homestay-system-131025\\database\\seeders\\RolesAndPermissionsSeeder.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\PossiblyPureStaticCallCollector' => 
    array (
      0 => 
      array (
        0 => 'Spatie\\Permission\\Models\\Role',
        1 => 'findOrCreate',
        2 => 26,
      ),
    ),
  ),
  'C:\\xampp\\htdocs\\homestay-system-131025\\database\\seeders\\SystemSettingSeeder.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\PossiblyPureStaticCallCollector' => 
    array (
      0 => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Builder',
        1 => 'create',
        2 => 74,
      ),
      1 => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Builder',
        1 => 'create',
        2 => 97,
      ),
      2 => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Builder',
        1 => 'create',
        2 => 120,
      ),
      3 => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Builder',
        1 => 'create',
        2 => 143,
      ),
      4 => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Builder',
        1 => 'create',
        2 => 150,
      ),
      5 => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Builder',
        1 => 'create',
        2 => 156,
      ),
      6 => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Builder',
        1 => 'create',
        2 => 162,
      ),
      7 => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Builder',
        1 => 'create',
        2 => 189,
      ),
      8 => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Builder',
        1 => 'create',
        2 => 207,
      ),
    ),
  ),
  'C:\\xampp\\htdocs\\homestay-system-131025\\routes\\web.php' => 
  array (
    'Larastan\\Larastan\\Collectors\\UsedViewFunctionCollector' => 
    array (
      0 => 'welcome',
    ),
    'PHPStan\\Rules\\DeadCode\\PossiblyPureStaticCallCollector' => 
    array (
      0 => 
      array (
        0 => 'Illuminate\\Support\\Facades\\Route',
        1 => 'get',
        2 => 5,
      ),
    ),
  ),
); },
	'dependencies' => array (
  'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Console\\Commands\\ValidateFactories.php' => 
  array (
    'fileHash' => 'f0ff29d890ccc61340ee50e4e5ed69704a5307a6',
    'dependentFiles' => 
    array (
    ),
  ),
  'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Console\\Commands\\ValidateModels.php' => 
  array (
    'fileHash' => '32b8788b34a01ac55ecd1f73ca68a8e66e4dfb2d',
    'dependentFiles' => 
    array (
    ),
  ),
  'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Http\\Controllers\\Controller.php' => 
  array (
    'fileHash' => 'd99029389cc1ed38caea0458dbc96dd996f0b3e6',
    'dependentFiles' => 
    array (
    ),
  ),
  'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\AuditLog.php' => 
  array (
    'fileHash' => 'b618493d6a321a9ba19454ed0a5b94a2b309dc9d',
    'dependentFiles' => 
    array (
      0 => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Console\\Commands\\ValidateFactories.php',
      1 => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Console\\Commands\\ValidateModels.php',
      2 => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\Import.php',
      3 => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\LaporanTerjadual.php',
      4 => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\User.php',
      5 => 'C:\\xampp\\htdocs\\homestay-system-131025\\config\\auth.php',
      6 => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\factories\\AuditLogFactory.php',
      7 => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\factories\\ImportFactory.php',
      8 => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\factories\\LaporanTerjadualFactory.php',
      9 => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\seeders\\DatabaseSeeder.php',
      10 => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\seeders\\SampleDataSeeder.php',
      11 => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\seeders\\UserSeeder.php',
    ),
  ),
  'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\Cluster.php' => 
  array (
    'fileHash' => '740abe0da6a4fd1fb1a3f12b5bd1bb05d59399b6',
    'dependentFiles' => 
    array (
      0 => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Console\\Commands\\ValidateFactories.php',
      1 => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Console\\Commands\\ValidateModels.php',
      2 => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\Cooperative.php',
      3 => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\Homestay.php',
      4 => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\Performance.php',
      5 => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\User.php',
      6 => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\factories\\ClusterFactory.php',
      7 => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\factories\\HomestayFactory.php',
      8 => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\factories\\PerformanceFactory.php',
      9 => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\seeders\\ClusterSeeder.php',
      10 => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\seeders\\HomestaySeeder.php',
      11 => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\seeders\\PerformanceSeeder.php',
      12 => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\seeders\\SampleDataSeeder.php',
    ),
  ),
  'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\Concerns\\HandlesScopedSettings.php' => 
  array (
    'fileHash' => '81caa2a3b4a0c15622aac695084b4f609cc29f6d',
    'dependentFiles' => 
    array (
    ),
  ),
  'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\Concerns\\HasUserAuthorization.php' => 
  array (
    'fileHash' => '2c25b6b078a7e3d3482ee9ef5bc9baf2cbe74885',
    'dependentFiles' => 
    array (
    ),
  ),
  'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\Concerns\\ManagesSystemSettings.php' => 
  array (
    'fileHash' => '61d388cd280af635c72dd778be50b763f76cd11d',
    'dependentFiles' => 
    array (
    ),
  ),
  'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\Concerns\\ValidatesPerformanceData.php' => 
  array (
    'fileHash' => 'b1617f08a455915fae8414fd2e0471e66bcc7d52',
    'dependentFiles' => 
    array (
      0 => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Console\\Commands\\ValidateModels.php',
      1 => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\Homestay.php',
      2 => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\Performance.php',
      3 => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\factories\\PerformanceFactory.php',
      4 => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\seeders\\PerformanceSeeder.php',
    ),
    'usedTraitDependentFiles' => 
    array (
      0 => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\Performance.php',
    ),
  ),
  'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\Cooperative.php' => 
  array (
    'fileHash' => '117bebc6d1b237a29435e25ca377fc9eba29b1b6',
    'dependentFiles' => 
    array (
      0 => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Console\\Commands\\ValidateFactories.php',
      1 => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Console\\Commands\\ValidateModels.php',
      2 => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\AuditLog.php',
      3 => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\Cluster.php',
      4 => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\Homestay.php',
      5 => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\Import.php',
      6 => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\LaporanTerjadual.php',
      7 => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\Performance.php',
      8 => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\User.php',
      9 => 'C:\\xampp\\htdocs\\homestay-system-131025\\config\\auth.php',
      10 => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\factories\\AuditLogFactory.php',
      11 => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\factories\\CooperativeFactory.php',
      12 => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\factories\\HomestayFactory.php',
      13 => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\factories\\ImportFactory.php',
      14 => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\factories\\LaporanTerjadualFactory.php',
      15 => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\factories\\PerformanceFactory.php',
      16 => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\seeders\\CooperativeSeeder.php',
      17 => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\seeders\\DatabaseSeeder.php',
      18 => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\seeders\\HomestaySeeder.php',
      19 => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\seeders\\PerformanceSeeder.php',
      20 => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\seeders\\SampleDataSeeder.php',
      21 => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\seeders\\UserSeeder.php',
    ),
  ),
  'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\Homestay.php' => 
  array (
    'fileHash' => 'ced9d142e2cdec4ec6baac6c9bd52d2b3b393de1',
    'dependentFiles' => 
    array (
      0 => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Console\\Commands\\ValidateFactories.php',
      1 => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Console\\Commands\\ValidateModels.php',
      2 => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\Cluster.php',
      3 => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\Cooperative.php',
      4 => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\Performance.php',
      5 => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\User.php',
      6 => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\factories\\ClusterFactory.php',
      7 => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\factories\\CooperativeFactory.php',
      8 => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\factories\\HomestayFactory.php',
      9 => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\factories\\PerformanceFactory.php',
      10 => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\seeders\\ClusterSeeder.php',
      11 => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\seeders\\CooperativeSeeder.php',
      12 => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\seeders\\HomestaySeeder.php',
      13 => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\seeders\\PerformanceSeeder.php',
      14 => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\seeders\\SampleDataSeeder.php',
      15 => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\seeders\\UserSeeder.php',
    ),
  ),
  'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\Import.php' => 
  array (
    'fileHash' => '92c1ca83e4566b36177936adfcdcab4c51b06b6a',
    'dependentFiles' => 
    array (
      0 => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Console\\Commands\\ValidateFactories.php',
      1 => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Console\\Commands\\ValidateModels.php',
      2 => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\AuditLog.php',
      3 => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\LaporanTerjadual.php',
      4 => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\User.php',
      5 => 'C:\\xampp\\htdocs\\homestay-system-131025\\config\\auth.php',
      6 => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\factories\\AuditLogFactory.php',
      7 => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\factories\\ImportFactory.php',
      8 => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\factories\\LaporanTerjadualFactory.php',
      9 => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\seeders\\DatabaseSeeder.php',
      10 => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\seeders\\SampleDataSeeder.php',
      11 => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\seeders\\UserSeeder.php',
    ),
  ),
  'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\LaporanTerjadual.php' => 
  array (
    'fileHash' => '14a40cedf47436424deb2943e5f9e24396339edd',
    'dependentFiles' => 
    array (
      0 => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Console\\Commands\\ValidateFactories.php',
      1 => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Console\\Commands\\ValidateModels.php',
      2 => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\AuditLog.php',
      3 => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\Import.php',
      4 => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\User.php',
      5 => 'C:\\xampp\\htdocs\\homestay-system-131025\\config\\auth.php',
      6 => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\factories\\AuditLogFactory.php',
      7 => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\factories\\ImportFactory.php',
      8 => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\factories\\LaporanTerjadualFactory.php',
      9 => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\seeders\\DatabaseSeeder.php',
      10 => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\seeders\\SampleDataSeeder.php',
      11 => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\seeders\\UserSeeder.php',
    ),
  ),
  'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\Performance.php' => 
  array (
    'fileHash' => '96e530bc326e7dfc28955c830394dc7cd4e1913e',
    'dependentFiles' => 
    array (
      0 => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Console\\Commands\\ValidateFactories.php',
      1 => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Console\\Commands\\ValidateModels.php',
      2 => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\Cluster.php',
      3 => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\Cooperative.php',
      4 => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\Homestay.php',
      5 => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\User.php',
      6 => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\factories\\HomestayFactory.php',
      7 => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\factories\\PerformanceFactory.php',
      8 => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\seeders\\HomestaySeeder.php',
      9 => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\seeders\\PerformanceSeeder.php',
      10 => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\seeders\\SampleDataSeeder.php',
    ),
  ),
  'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\SystemSetting.php' => 
  array (
    'fileHash' => '5341864dd9be95e3f0336c32e443065aeab8fdb8',
    'dependentFiles' => 
    array (
      0 => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Console\\Commands\\ValidateFactories.php',
      1 => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Console\\Commands\\ValidateModels.php',
      2 => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\factories\\SystemSettingFactory.php',
      3 => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\seeders\\SystemSettingSeeder.php',
    ),
  ),
  'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\User.php' => 
  array (
    'fileHash' => '36d1936a6d1a65a96e3f7e9bd6eb9cb565f8d511',
    'dependentFiles' => 
    array (
      0 => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Console\\Commands\\ValidateFactories.php',
      1 => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Console\\Commands\\ValidateModels.php',
      2 => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\AuditLog.php',
      3 => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\Import.php',
      4 => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\LaporanTerjadual.php',
      5 => 'C:\\xampp\\htdocs\\homestay-system-131025\\config\\auth.php',
      6 => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\factories\\AuditLogFactory.php',
      7 => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\factories\\ImportFactory.php',
      8 => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\factories\\LaporanTerjadualFactory.php',
      9 => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\factories\\UserFactory.php',
      10 => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\seeders\\DatabaseSeeder.php',
      11 => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\seeders\\SampleDataSeeder.php',
      12 => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\seeders\\UserSeeder.php',
    ),
  ),
  'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Providers\\AppServiceProvider.php' => 
  array (
    'fileHash' => '89241dd248b22d5bde9de99053e1d9395b950064',
    'dependentFiles' => 
    array (
      0 => 'C:\\xampp\\htdocs\\homestay-system-131025\\bootstrap\\providers.php',
    ),
  ),
  'C:\\xampp\\htdocs\\homestay-system-131025\\bootstrap\\app.php' => 
  array (
    'fileHash' => '4ddbdb569140ef05c177ce831a5a52cc2f2264b4',
    'dependentFiles' => 
    array (
    ),
  ),
  'C:\\xampp\\htdocs\\homestay-system-131025\\bootstrap\\cache\\packages.php' => 
  array (
    'fileHash' => '114badd0f1c70aa0e40b04de191d390351a43940',
    'dependentFiles' => 
    array (
    ),
  ),
  'C:\\xampp\\htdocs\\homestay-system-131025\\bootstrap\\cache\\services.php' => 
  array (
    'fileHash' => '02e8aaec69ab70e939e445a983b7e36070e8fef9',
    'dependentFiles' => 
    array (
    ),
  ),
  'C:\\xampp\\htdocs\\homestay-system-131025\\bootstrap\\providers.php' => 
  array (
    'fileHash' => 'eed995ef205459a92c483d5e4f5bc1fed5ca7e67',
    'dependentFiles' => 
    array (
    ),
  ),
  'C:\\xampp\\htdocs\\homestay-system-131025\\config\\app.php' => 
  array (
    'fileHash' => '248b42420be2f4010a1597761cd348f374a5acd0',
    'dependentFiles' => 
    array (
    ),
  ),
  'C:\\xampp\\htdocs\\homestay-system-131025\\config\\auth.php' => 
  array (
    'fileHash' => 'd14c6ca41850324dcf3bde4b8c4fe4635d21b02e',
    'dependentFiles' => 
    array (
    ),
  ),
  'C:\\xampp\\htdocs\\homestay-system-131025\\config\\cache.php' => 
  array (
    'fileHash' => '740a310b2e153d013bba8733eef5a96d9ab38024',
    'dependentFiles' => 
    array (
    ),
  ),
  'C:\\xampp\\htdocs\\homestay-system-131025\\config\\database.php' => 
  array (
    'fileHash' => '4d7bb78ce43539e75ede1418a37fd5b9cecbb718',
    'dependentFiles' => 
    array (
    ),
  ),
  'C:\\xampp\\htdocs\\homestay-system-131025\\config\\filesystems.php' => 
  array (
    'fileHash' => '6e1e66753542ecbccfe730cfee0d623723be2986',
    'dependentFiles' => 
    array (
    ),
  ),
  'C:\\xampp\\htdocs\\homestay-system-131025\\config\\insights.php' => 
  array (
    'fileHash' => 'ca4608e91e268a7ff8ca4016501071dcda32d8b2',
    'dependentFiles' => 
    array (
    ),
  ),
  'C:\\xampp\\htdocs\\homestay-system-131025\\config\\logging.php' => 
  array (
    'fileHash' => 'f163e17e3d43b2aa18f20994b2d26c2ccabd5abc',
    'dependentFiles' => 
    array (
    ),
  ),
  'C:\\xampp\\htdocs\\homestay-system-131025\\config\\mail.php' => 
  array (
    'fileHash' => '55990e37cb337eee513173e5c48479cbb1e5202e',
    'dependentFiles' => 
    array (
    ),
  ),
  'C:\\xampp\\htdocs\\homestay-system-131025\\config\\queue.php' => 
  array (
    'fileHash' => '258c42a365b1b4bee36b69053966a3fd836a9394',
    'dependentFiles' => 
    array (
    ),
  ),
  'C:\\xampp\\htdocs\\homestay-system-131025\\config\\services.php' => 
  array (
    'fileHash' => 'e5d2f1a1f6f4d2ebf16e796ab0ac542c572f43bf',
    'dependentFiles' => 
    array (
    ),
  ),
  'C:\\xampp\\htdocs\\homestay-system-131025\\config\\session.php' => 
  array (
    'fileHash' => 'a0ce1b173c09908a3d698b26372566c604844a94',
    'dependentFiles' => 
    array (
    ),
  ),
  'C:\\xampp\\htdocs\\homestay-system-131025\\database\\factories\\AuditLogFactory.php' => 
  array (
    'fileHash' => '459891185add8c350c44b7e4e0548aa517d35394',
    'dependentFiles' => 
    array (
      0 => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Console\\Commands\\ValidateFactories.php',
      1 => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\seeders\\SampleDataSeeder.php',
    ),
  ),
  'C:\\xampp\\htdocs\\homestay-system-131025\\database\\factories\\ClusterFactory.php' => 
  array (
    'fileHash' => '107c0b3eef51878271d05ebde68ef77c9613a8a5',
    'dependentFiles' => 
    array (
      0 => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Console\\Commands\\ValidateFactories.php',
      1 => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Console\\Commands\\ValidateModels.php',
      2 => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\Cluster.php',
      3 => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\Homestay.php',
      4 => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\factories\\HomestayFactory.php',
      5 => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\seeders\\ClusterSeeder.php',
      6 => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\seeders\\HomestaySeeder.php',
    ),
  ),
  'C:\\xampp\\htdocs\\homestay-system-131025\\database\\factories\\CooperativeFactory.php' => 
  array (
    'fileHash' => '6d02f5b0e62fa475a577ddf238166625a6eb100b',
    'dependentFiles' => 
    array (
      0 => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Console\\Commands\\ValidateFactories.php',
      1 => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Console\\Commands\\ValidateModels.php',
      2 => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\Cooperative.php',
      3 => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\Homestay.php',
      4 => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\User.php',
      5 => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\factories\\HomestayFactory.php',
      6 => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\seeders\\CooperativeSeeder.php',
      7 => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\seeders\\HomestaySeeder.php',
      8 => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\seeders\\UserSeeder.php',
    ),
  ),
  'C:\\xampp\\htdocs\\homestay-system-131025\\database\\factories\\HomestayFactory.php' => 
  array (
    'fileHash' => '4a59467937c5e3874a1fca6cd3edc41849904b73',
    'dependentFiles' => 
    array (
      0 => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Console\\Commands\\ValidateFactories.php',
      1 => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Console\\Commands\\ValidateModels.php',
      2 => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\Cluster.php',
      3 => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\Cooperative.php',
      4 => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\Homestay.php',
      5 => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\Performance.php',
      6 => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\User.php',
      7 => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\factories\\PerformanceFactory.php',
      8 => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\seeders\\HomestaySeeder.php',
      9 => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\seeders\\PerformanceSeeder.php',
      10 => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\seeders\\SampleDataSeeder.php',
    ),
  ),
  'C:\\xampp\\htdocs\\homestay-system-131025\\database\\factories\\ImportFactory.php' => 
  array (
    'fileHash' => '18ffd358896e34158b04182003d6f9962b959db1',
    'dependentFiles' => 
    array (
      0 => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Console\\Commands\\ValidateFactories.php',
      1 => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Console\\Commands\\ValidateModels.php',
      2 => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\Import.php',
      3 => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\User.php',
      4 => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\seeders\\SampleDataSeeder.php',
    ),
  ),
  'C:\\xampp\\htdocs\\homestay-system-131025\\database\\factories\\LaporanTerjadualFactory.php' => 
  array (
    'fileHash' => '5cc0df081169184a29fb851d2cb75ceb1ce62406',
    'dependentFiles' => 
    array (
      0 => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Console\\Commands\\ValidateFactories.php',
      1 => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Console\\Commands\\ValidateModels.php',
      2 => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\LaporanTerjadual.php',
      3 => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\User.php',
      4 => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\seeders\\SampleDataSeeder.php',
    ),
  ),
  'C:\\xampp\\htdocs\\homestay-system-131025\\database\\factories\\PerformanceFactory.php' => 
  array (
    'fileHash' => '49412cbff35f7a9b6aaf213905fb253824952b3c',
    'dependentFiles' => 
    array (
      0 => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Console\\Commands\\ValidateFactories.php',
      1 => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Console\\Commands\\ValidateModels.php',
      2 => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\Homestay.php',
      3 => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\Performance.php',
      4 => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\seeders\\PerformanceSeeder.php',
    ),
  ),
  'C:\\xampp\\htdocs\\homestay-system-131025\\database\\factories\\SystemSettingFactory.php' => 
  array (
    'fileHash' => '1d476a01e6dc640e8f7cbb1d91e3afc47d249533',
    'dependentFiles' => 
    array (
      0 => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Console\\Commands\\ValidateFactories.php',
      1 => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Console\\Commands\\ValidateModels.php',
      2 => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\SystemSetting.php',
      3 => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\seeders\\SystemSettingSeeder.php',
    ),
  ),
  'C:\\xampp\\htdocs\\homestay-system-131025\\database\\factories\\UserFactory.php' => 
  array (
    'fileHash' => 'e25f89fa2ede3bdf067db9ce05b42456e21721cc',
    'dependentFiles' => 
    array (
      0 => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Console\\Commands\\ValidateFactories.php',
      1 => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Console\\Commands\\ValidateModels.php',
      2 => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\AuditLog.php',
      3 => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\Import.php',
      4 => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\LaporanTerjadual.php',
      5 => 'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\User.php',
      6 => 'C:\\xampp\\htdocs\\homestay-system-131025\\config\\auth.php',
      7 => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\factories\\AuditLogFactory.php',
      8 => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\factories\\ImportFactory.php',
      9 => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\factories\\LaporanTerjadualFactory.php',
      10 => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\seeders\\DatabaseSeeder.php',
      11 => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\seeders\\SampleDataSeeder.php',
      12 => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\seeders\\UserSeeder.php',
    ),
  ),
  'C:\\xampp\\htdocs\\homestay-system-131025\\database\\migrations\\0001_01_01_000000_create_users_table.php' => 
  array (
    'fileHash' => 'c83722f2f43dc31195e37312e72524af995c15a9',
    'dependentFiles' => 
    array (
    ),
  ),
  'C:\\xampp\\htdocs\\homestay-system-131025\\database\\migrations\\0001_01_01_000001_create_cache_table.php' => 
  array (
    'fileHash' => '1e63143baede25661ec2075259ba517cbf2c2400',
    'dependentFiles' => 
    array (
    ),
  ),
  'C:\\xampp\\htdocs\\homestay-system-131025\\database\\migrations\\0001_01_01_000002_create_jobs_table.php' => 
  array (
    'fileHash' => '61d635023428eaa5cc6f27e5b7f9683817125a50',
    'dependentFiles' => 
    array (
    ),
  ),
  'C:\\xampp\\htdocs\\homestay-system-131025\\database\\migrations\\2025_10_13_024251_create_sessions_table.php' => 
  array (
    'fileHash' => '35452573006d028d38e8f162c409f3c32d85b9c9',
    'dependentFiles' => 
    array (
    ),
  ),
  'C:\\xampp\\htdocs\\homestay-system-131025\\database\\migrations\\2025_10_13_090001_create_clusters_table.php' => 
  array (
    'fileHash' => '2cc749eb44d4a2552e4752274d2d36ad6b9f5bf7',
    'dependentFiles' => 
    array (
    ),
  ),
  'C:\\xampp\\htdocs\\homestay-system-131025\\database\\migrations\\2025_10_13_090100_create_cooperatives_table.php' => 
  array (
    'fileHash' => 'a0252aa24d0da8d162af8398c3a95c275a22993c',
    'dependentFiles' => 
    array (
    ),
  ),
  'C:\\xampp\\htdocs\\homestay-system-131025\\database\\migrations\\2025_10_13_090200_create_homestays_table.php' => 
  array (
    'fileHash' => 'd37c578c7dafbfddacb4f6adf0ea937fd032533a',
    'dependentFiles' => 
    array (
    ),
  ),
  'C:\\xampp\\htdocs\\homestay-system-131025\\database\\migrations\\2025_10_13_090300_create_performances_table.php' => 
  array (
    'fileHash' => '884e3f8216501e5640fca9316cd488d1c9aa155f',
    'dependentFiles' => 
    array (
    ),
  ),
  'C:\\xampp\\htdocs\\homestay-system-131025\\database\\migrations\\2025_10_13_090400_create_imports_table.php' => 
  array (
    'fileHash' => '2549a55cf68ce70a72e64b1663952823a79c5a30',
    'dependentFiles' => 
    array (
    ),
  ),
  'C:\\xampp\\htdocs\\homestay-system-131025\\database\\migrations\\2025_10_13_090500_create_audit_logs_table.php' => 
  array (
    'fileHash' => '8cbfb79ae65c33b3756fd0d23c006f16f33c0e39',
    'dependentFiles' => 
    array (
    ),
  ),
  'C:\\xampp\\htdocs\\homestay-system-131025\\database\\migrations\\2025_10_13_090600_create_system_settings_table.php' => 
  array (
    'fileHash' => 'd6d4a5650e6c956d82f5ab972964cd4550168caf',
    'dependentFiles' => 
    array (
    ),
  ),
  'C:\\xampp\\htdocs\\homestay-system-131025\\database\\migrations\\2025_10_13_090700_create_notifications_table.php' => 
  array (
    'fileHash' => 'c23e10283f41f2bb4c00837733356e2bcb427e5b',
    'dependentFiles' => 
    array (
    ),
  ),
  'C:\\xampp\\htdocs\\homestay-system-131025\\database\\migrations\\2025_10_13_090800_create_laporan_terjadual_table.php' => 
  array (
    'fileHash' => '9809f3c328d2ec13c2492d85fbc9f36a5da1421b',
    'dependentFiles' => 
    array (
    ),
  ),
  'C:\\xampp\\htdocs\\homestay-system-131025\\database\\migrations\\2025_10_13_090900_add_scope_fields_to_users_table.php' => 
  array (
    'fileHash' => 'ad3e06ee96bac888ea5ac4b3e1dd3f9fc3326681',
    'dependentFiles' => 
    array (
    ),
  ),
  'C:\\xampp\\htdocs\\homestay-system-131025\\database\\seeders\\ClusterSeeder.php' => 
  array (
    'fileHash' => '1cfd739ac1c0464030cec98d9870ff456cddcdce',
    'dependentFiles' => 
    array (
      0 => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\seeders\\DatabaseSeeder.php',
    ),
  ),
  'C:\\xampp\\htdocs\\homestay-system-131025\\database\\seeders\\CooperativeSeeder.php' => 
  array (
    'fileHash' => '76f2238387c3f3b664954c0e2d131244012f64e9',
    'dependentFiles' => 
    array (
      0 => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\seeders\\DatabaseSeeder.php',
    ),
  ),
  'C:\\xampp\\htdocs\\homestay-system-131025\\database\\seeders\\DatabaseSeeder.php' => 
  array (
    'fileHash' => '6dae9e917275bf80bdd4dccdc3f361d16bdda3be',
    'dependentFiles' => 
    array (
    ),
  ),
  'C:\\xampp\\htdocs\\homestay-system-131025\\database\\seeders\\HomestaySeeder.php' => 
  array (
    'fileHash' => '8fc14c4364d04738ae73371c5674d5c5da4f2bf1',
    'dependentFiles' => 
    array (
      0 => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\seeders\\DatabaseSeeder.php',
    ),
  ),
  'C:\\xampp\\htdocs\\homestay-system-131025\\database\\seeders\\PerformanceSeeder.php' => 
  array (
    'fileHash' => 'e45208a06af7c9d6ef72295714be575fe07bfb44',
    'dependentFiles' => 
    array (
      0 => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\seeders\\DatabaseSeeder.php',
    ),
  ),
  'C:\\xampp\\htdocs\\homestay-system-131025\\database\\seeders\\ReferenceDataSeeder.php' => 
  array (
    'fileHash' => '3922f1757332066a1fd7cc96bc1d7885df6ad681',
    'dependentFiles' => 
    array (
      0 => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\seeders\\DatabaseSeeder.php',
    ),
  ),
  'C:\\xampp\\htdocs\\homestay-system-131025\\database\\seeders\\RolesAndPermissionsSeeder.php' => 
  array (
    'fileHash' => 'f42e04a14106f0e46ea23922d41a487e07bbf8bf',
    'dependentFiles' => 
    array (
      0 => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\seeders\\DatabaseSeeder.php',
    ),
  ),
  'C:\\xampp\\htdocs\\homestay-system-131025\\database\\seeders\\SampleDataSeeder.php' => 
  array (
    'fileHash' => 'b8d52564098331fc41ea0f7ac04089a1ea566ec5',
    'dependentFiles' => 
    array (
      0 => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\seeders\\DatabaseSeeder.php',
    ),
  ),
  'C:\\xampp\\htdocs\\homestay-system-131025\\database\\seeders\\SystemSettingSeeder.php' => 
  array (
    'fileHash' => 'a3a56c9ed747aa15b6317c153077b1e090c644b2',
    'dependentFiles' => 
    array (
      0 => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\seeders\\DatabaseSeeder.php',
    ),
  ),
  'C:\\xampp\\htdocs\\homestay-system-131025\\database\\seeders\\UserSeeder.php' => 
  array (
    'fileHash' => 'e983c1770c8b6afe407779e75d040fed66c8a433',
    'dependentFiles' => 
    array (
      0 => 'C:\\xampp\\htdocs\\homestay-system-131025\\database\\seeders\\DatabaseSeeder.php',
    ),
  ),
  'C:\\xampp\\htdocs\\homestay-system-131025\\routes\\console.php' => 
  array (
    'fileHash' => '302bdfc3b87dd1b70c1dc59645e1235395c9c0e3',
    'dependentFiles' => 
    array (
    ),
  ),
  'C:\\xampp\\htdocs\\homestay-system-131025\\routes\\web.php' => 
  array (
    'fileHash' => '2f63d05f77bbdde1a6ef48ce7c5d4dc1f126afa3',
    'dependentFiles' => 
    array (
    ),
  ),
),
	'exportedNodesCallback' => static function (): array { return array (
  'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Console\\Commands\\ValidateFactories.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Console\\Commands\\ValidateFactories',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Console\\Command',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'signature',
          ),
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * The name and signature of the console command.
     *
     * @var string
     */',
             'namespace' => 'App\\Console\\Commands',
             'uses' => 
            array (
              'auditlogfactory' => 'Database\\Factories\\AuditLogFactory',
              'clusterfactory' => 'Database\\Factories\\ClusterFactory',
              'cooperativefactory' => 'Database\\Factories\\CooperativeFactory',
              'homestayfactory' => 'Database\\Factories\\HomestayFactory',
              'importfactory' => 'Database\\Factories\\ImportFactory',
              'laporanterjadualfactory' => 'Database\\Factories\\LaporanTerjadualFactory',
              'performancefactory' => 'Database\\Factories\\PerformanceFactory',
              'systemsettingfactory' => 'Database\\Factories\\SystemSettingFactory',
              'userfactory' => 'Database\\Factories\\UserFactory',
              'command' => 'Illuminate\\Console\\Command',
              'factory' => 'Illuminate\\Database\\Eloquent\\Factories\\Factory',
            ),
             'constUses' => 
            array (
            ),
          )),
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'description',
          ),
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * The console command description.
     *
     * @var string
     */',
             'namespace' => 'App\\Console\\Commands',
             'uses' => 
            array (
              'auditlogfactory' => 'Database\\Factories\\AuditLogFactory',
              'clusterfactory' => 'Database\\Factories\\ClusterFactory',
              'cooperativefactory' => 'Database\\Factories\\CooperativeFactory',
              'homestayfactory' => 'Database\\Factories\\HomestayFactory',
              'importfactory' => 'Database\\Factories\\ImportFactory',
              'laporanterjadualfactory' => 'Database\\Factories\\LaporanTerjadualFactory',
              'performancefactory' => 'Database\\Factories\\PerformanceFactory',
              'systemsettingfactory' => 'Database\\Factories\\SystemSettingFactory',
              'userfactory' => 'Database\\Factories\\UserFactory',
              'command' => 'Illuminate\\Console\\Command',
              'factory' => 'Illuminate\\Database\\Eloquent\\Factories\\Factory',
            ),
             'constUses' => 
            array (
            ),
          )),
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'handle',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Execute the console command.
     */',
             'namespace' => 'App\\Console\\Commands',
             'uses' => 
            array (
              'auditlogfactory' => 'Database\\Factories\\AuditLogFactory',
              'clusterfactory' => 'Database\\Factories\\ClusterFactory',
              'cooperativefactory' => 'Database\\Factories\\CooperativeFactory',
              'homestayfactory' => 'Database\\Factories\\HomestayFactory',
              'importfactory' => 'Database\\Factories\\ImportFactory',
              'laporanterjadualfactory' => 'Database\\Factories\\LaporanTerjadualFactory',
              'performancefactory' => 'Database\\Factories\\PerformanceFactory',
              'systemsettingfactory' => 'Database\\Factories\\SystemSettingFactory',
              'userfactory' => 'Database\\Factories\\UserFactory',
              'command' => 'Illuminate\\Console\\Command',
              'factory' => 'Illuminate\\Database\\Eloquent\\Factories\\Factory',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'int',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Console\\Commands\\ValidateModels.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Console\\Commands\\ValidateModels',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Console\\Command',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'signature',
          ),
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * The name and signature of the console command.
     *
     * @var string
     */',
             'namespace' => 'App\\Console\\Commands',
             'uses' => 
            array (
              'auditlog' => 'App\\Models\\AuditLog',
              'cluster' => 'App\\Models\\Cluster',
              'cooperative' => 'App\\Models\\Cooperative',
              'homestay' => 'App\\Models\\Homestay',
              'import' => 'App\\Models\\Import',
              'laporanterjadual' => 'App\\Models\\LaporanTerjadual',
              'performance' => 'App\\Models\\Performance',
              'systemsetting' => 'App\\Models\\SystemSetting',
              'user' => 'App\\Models\\User',
              'command' => 'Illuminate\\Console\\Command',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'schema' => 'Illuminate\\Support\\Facades\\Schema',
            ),
             'constUses' => 
            array (
            ),
          )),
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'description',
          ),
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * The console command description.
     *
     * @var string
     */',
             'namespace' => 'App\\Console\\Commands',
             'uses' => 
            array (
              'auditlog' => 'App\\Models\\AuditLog',
              'cluster' => 'App\\Models\\Cluster',
              'cooperative' => 'App\\Models\\Cooperative',
              'homestay' => 'App\\Models\\Homestay',
              'import' => 'App\\Models\\Import',
              'laporanterjadual' => 'App\\Models\\LaporanTerjadual',
              'performance' => 'App\\Models\\Performance',
              'systemsetting' => 'App\\Models\\SystemSetting',
              'user' => 'App\\Models\\User',
              'command' => 'Illuminate\\Console\\Command',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'schema' => 'Illuminate\\Support\\Facades\\Schema',
            ),
             'constUses' => 
            array (
            ),
          )),
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'handle',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Execute the console command.
     */',
             'namespace' => 'App\\Console\\Commands',
             'uses' => 
            array (
              'auditlog' => 'App\\Models\\AuditLog',
              'cluster' => 'App\\Models\\Cluster',
              'cooperative' => 'App\\Models\\Cooperative',
              'homestay' => 'App\\Models\\Homestay',
              'import' => 'App\\Models\\Import',
              'laporanterjadual' => 'App\\Models\\LaporanTerjadual',
              'performance' => 'App\\Models\\Performance',
              'systemsetting' => 'App\\Models\\SystemSetting',
              'user' => 'App\\Models\\User',
              'command' => 'Illuminate\\Console\\Command',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'schema' => 'Illuminate\\Support\\Facades\\Schema',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'int',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Http\\Controllers\\Controller.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Controllers\\Controller',
       'phpDoc' => NULL,
       'abstract' => true,
       'final' => false,
       'extends' => NULL,
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\AuditLog.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Models\\AuditLog',
       'phpDoc' => 
      \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
         'phpDocString' => '/**
 * @phpstan-use \\Illuminate\\Database\\Eloquent\\Factories\\HasFactory<\\App\\Models\\AuditLog>
 */',
         'namespace' => 'App\\Models',
         'uses' => 
        array (
          'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
          'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
          'model' => 'Illuminate\\Database\\Eloquent\\Model',
          'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
          'auth' => 'Illuminate\\Support\\Facades\\Auth',
        ),
         'constUses' => 
        array (
        ),
      )),
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Database\\Eloquent\\Model',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'table',
          ),
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * The table associated with the model.
     *
     * @var string
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
              'auth' => 'Illuminate\\Support\\Facades\\Auth',
            ),
             'constUses' => 
            array (
            ),
          )),
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'fillable',
          ),
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
              'auth' => 'Illuminate\\Support\\Facades\\Auth',
            ),
             'constUses' => 
            array (
            ),
          )),
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'appends',
          ),
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * The accessors to append to the model\'s array form.
     *
     * @var list<string>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
              'auth' => 'Illuminate\\Support\\Facades\\Auth',
            ),
             'constUses' => 
            array (
            ),
          )),
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'user',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @phpstan-ignore-next-line
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
              'auth' => 'Illuminate\\Support\\Facades\\Auth',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'scopeByAction',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @param  Builder<\\App\\Models\\AuditLog>  $query
     * @return Builder<\\App\\Models\\AuditLog>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
              'auth' => 'Illuminate\\Support\\Facades\\Auth',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Builder',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'query',
               'type' => 'Illuminate\\Database\\Eloquent\\Builder',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'action',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        5 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'scopeByModel',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @param  Builder<\\App\\Models\\AuditLog>  $query
     * @return Builder<\\App\\Models\\AuditLog>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
              'auth' => 'Illuminate\\Support\\Facades\\Auth',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Builder',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'query',
               'type' => 'Illuminate\\Database\\Eloquent\\Builder',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'model',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        6 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'scopeByModelInstance',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @param  Builder<\\App\\Models\\AuditLog>  $query
     * @return Builder<\\App\\Models\\AuditLog>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
              'auth' => 'Illuminate\\Support\\Facades\\Auth',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Builder',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'query',
               'type' => 'Illuminate\\Database\\Eloquent\\Builder',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'model',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            2 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'modelId',
               'type' => 'int',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        7 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'scopeByUser',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @param  Builder<\\App\\Models\\AuditLog>  $query
     * @return Builder<\\App\\Models\\AuditLog>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
              'auth' => 'Illuminate\\Support\\Facades\\Auth',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Builder',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'query',
               'type' => 'Illuminate\\Database\\Eloquent\\Builder',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'userId',
               'type' => 'int',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        8 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'scopeBetweenDates',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @param  Builder<\\App\\Models\\AuditLog>  $query
     * @return Builder<\\App\\Models\\AuditLog>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
              'auth' => 'Illuminate\\Support\\Facades\\Auth',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Builder',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'query',
               'type' => 'Illuminate\\Database\\Eloquent\\Builder',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'from',
               'type' => 'Carbon\\Carbon',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            2 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'to',
               'type' => 'Carbon\\Carbon',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        9 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'scopeToday',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @param  Builder<\\App\\Models\\AuditLog>  $query
     * @return Builder<\\App\\Models\\AuditLog>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
              'auth' => 'Illuminate\\Support\\Facades\\Auth',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Builder',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'query',
               'type' => 'Illuminate\\Database\\Eloquent\\Builder',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        10 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'scopeRecent',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @param  Builder<\\App\\Models\\AuditLog>  $query
     * @return Builder<\\App\\Models\\AuditLog>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
              'auth' => 'Illuminate\\Support\\Facades\\Auth',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Builder',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'query',
               'type' => 'Illuminate\\Database\\Eloquent\\Builder',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        11 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'scopeCrudOperations',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @param  Builder<\\App\\Models\\AuditLog>  $query
     * @return Builder<\\App\\Models\\AuditLog>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
              'auth' => 'Illuminate\\Support\\Facades\\Auth',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Builder',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'query',
               'type' => 'Illuminate\\Database\\Eloquent\\Builder',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        12 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'scopeImportOperations',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @param  Builder<\\App\\Models\\AuditLog>  $query
     * @return Builder<\\App\\Models\\AuditLog>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
              'auth' => 'Illuminate\\Support\\Facades\\Auth',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Builder',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'query',
               'type' => 'Illuminate\\Database\\Eloquent\\Builder',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        13 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getSummaryAttribute',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get a human-readable summary of the audit log entry.
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
              'auth' => 'Illuminate\\Support\\Facades\\Auth',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'string',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        14 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getChangesAttribute',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @return array<string,array{before:mixed,after:mixed}>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
              'auth' => 'Illuminate\\Support\\Facades\\Auth',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        15 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'logCreated',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Log a model creation event.
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
              'auth' => 'Illuminate\\Support\\Facades\\Auth',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'void',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'model',
               'type' => 'Illuminate\\Database\\Eloquent\\Model',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'user',
               'type' => '?App\\Models\\User',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        16 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'logUpdated',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @param  array<string,mixed>  $original
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
              'auth' => 'Illuminate\\Support\\Facades\\Auth',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'void',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'model',
               'type' => 'Illuminate\\Database\\Eloquent\\Model',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'original',
               'type' => 'array',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            2 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'user',
               'type' => '?App\\Models\\User',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        17 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'logDeleted',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Log a model deletion event.
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
              'auth' => 'Illuminate\\Support\\Facades\\Auth',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'void',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'model',
               'type' => 'Illuminate\\Database\\Eloquent\\Model',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'user',
               'type' => '?App\\Models\\User',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        18 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'logImport',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @param  array<string,mixed>|null  $meta
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
              'auth' => 'Illuminate\\Support\\Facades\\Auth',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'void',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'type',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'recordsCount',
               'type' => 'int',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            2 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'user',
               'type' => '?App\\Models\\User',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
            )),
            3 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'meta',
               'type' => '?array',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        19 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'logEvent',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @param  array<string,mixed>|null  $data
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
              'auth' => 'Illuminate\\Support\\Facades\\Auth',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'void',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'action',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'data',
               'type' => '?array',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
            )),
            2 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'user',
               'type' => '?App\\Models\\User',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        20 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'casts',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
              'auth' => 'Illuminate\\Support\\Facades\\Auth',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\Cluster.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Models\\Cluster',
       'phpDoc' => 
      \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
         'phpDocString' => '/**
 * Cluster Model
 *
 * Represents a themed cluster or grouping of homestays (e.g., Eco-Tourism, Cultural Heritage).
 * Clusters are organized by state and can contain multiple homestays.
 *
 * @property int $id Primary key
 * @property string $nama Cluster name
 * @property string $negeri State code (e.g., \'Selangor\', \'Johor\')
 * @property string|null $keterangan Cluster description
 * @property \\Carbon\\Carbon $created_at
 * @property \\Carbon\\Carbon $updated_at
 * @property \\Carbon\\Carbon|null $deleted_at
 * @property-read \\Illuminate\\Database\\Eloquent\\Collection<int,\\App\\Models\\Homestay> $homestays
 * @property-read int $jumlah_homestay Number of homestays in cluster
 * @property-read int $jumlah_homestay_aktif Number of active homestays in cluster
 *
 * @method static \\Database\\Factories\\ClusterFactory factory(...$parameters)
 */',
         'namespace' => 'App\\Models',
         'uses' => 
        array (
          'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
          'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
          'model' => 'Illuminate\\Database\\Eloquent\\Model',
          'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
          'softdeletes' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
        ),
         'constUses' => 
        array (
        ),
      )),
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Database\\Eloquent\\Model',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
        1 => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'table',
          ),
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * The table associated with the model.
     *
     * @var string
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
              'softdeletes' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
            ),
             'constUses' => 
            array (
            ),
          )),
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'fillable',
          ),
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
              'softdeletes' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
            ),
             'constUses' => 
            array (
            ),
          )),
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'appends',
          ),
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * The accessors to append to the model\'s array form.
     *
     * @var list<string>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
              'softdeletes' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
            ),
             'constUses' => 
            array (
            ),
          )),
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'homestays',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get all homestays in this cluster.
     *
     * @return HasMany<\\App\\Models\\Homestay, \\App\\Models\\Cluster>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
              'softdeletes' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'scopeByNegeri',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Scope query to filter by negeri (state).
     *
     * @param  Builder<\\App\\Models\\Cluster>  $query
     * @return Builder<\\App\\Models\\Cluster>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
              'softdeletes' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Builder',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'query',
               'type' => 'Illuminate\\Database\\Eloquent\\Builder',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'negeri',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        5 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'scopeWithActiveHomestays',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Scope query to include clusters with active homestays.
     *
     * @param  Builder<\\App\\Models\\Cluster>  $query
     * @return Builder<\\App\\Models\\Cluster>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
              'softdeletes' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Builder',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'query',
               'type' => 'Illuminate\\Database\\Eloquent\\Builder',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        6 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getJumlahHomestayAttribute',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get the total number of homestays in this cluster.
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
              'softdeletes' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'int',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        7 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getJumlahHomestayAktifAttribute',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get the number of active homestays in this cluster.
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
              'softdeletes' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'int',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        8 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'setNegeriAttribute',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Set the negeri attribute to ensure consistent format.
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
              'softdeletes' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'void',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'value',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        9 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'setNamaAttribute',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Set the nama attribute to ensure proper formatting.
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
              'softdeletes' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'void',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'value',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        10 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'casts',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
              'softdeletes' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\Concerns\\HandlesScopedSettings.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedTraitNode::__set_state(array(
       'name' => 'App\\Models\\Concerns\\HandlesScopedSettings',
       'phpDoc' => 
      \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
         'phpDocString' => '/**
 * Trait for handling scoped setting operations (negeri and koperasi).
 */',
         'namespace' => 'App\\Models\\Concerns',
         'uses' => 
        array (
          'systemsetting' => 'App\\Models\\SystemSetting',
        ),
         'constUses' => 
        array (
        ),
      )),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getNegeri',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get a negeri-scoped setting value.
     *
     * @param  mixed  $default
     * @return mixed
     */',
             'namespace' => 'App\\Models\\Concerns',
             'uses' => 
            array (
              'systemsetting' => 'App\\Models\\SystemSetting',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'key',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'negeri',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            2 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'default',
               'type' => NULL,
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'setNegeri',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Set a negeri-scoped setting value.
     *
     * @param  mixed  $value
     */',
             'namespace' => 'App\\Models\\Concerns',
             'uses' => 
            array (
              'systemsetting' => 'App\\Models\\SystemSetting',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'App\\Models\\SystemSetting',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'key',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'value',
               'type' => NULL,
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            2 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'negeri',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getKoperasi',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get a koperasi-scoped setting value.
     *
     * @param  mixed  $default
     * @return mixed
     */',
             'namespace' => 'App\\Models\\Concerns',
             'uses' => 
            array (
              'systemsetting' => 'App\\Models\\SystemSetting',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'key',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'koperasiId',
               'type' => 'int',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            2 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'default',
               'type' => NULL,
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'setKoperasi',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Set a koperasi-scoped setting value.
     *
     * @param  mixed  $value
     */',
             'namespace' => 'App\\Models\\Concerns',
             'uses' => 
            array (
              'systemsetting' => 'App\\Models\\SystemSetting',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'App\\Models\\SystemSetting',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'key',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'value',
               'type' => NULL,
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            2 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'koperasiId',
               'type' => 'int',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getScopedValue',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get scoped value with fallback to global.
     *
     * @param  mixed  $default
     * @return mixed
     */',
             'namespace' => 'App\\Models\\Concerns',
             'uses' => 
            array (
              'systemsetting' => 'App\\Models\\SystemSetting',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'key',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'scope',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            2 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'default',
               'type' => NULL,
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\Concerns\\HasUserAuthorization.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedTraitNode::__set_state(array(
       'name' => 'App\\Models\\Concerns\\HasUserAuthorization',
       'phpDoc' => 
      \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
         'phpDocString' => '/**
 * User Authorization Methods Trait
 *
 * Handles all user authorization and permission checking logic
 * to reduce complexity in the main User model.
 */',
         'namespace' => 'App\\Models\\Concerns',
         'uses' => 
        array (
          'homestay' => 'App\\Models\\Homestay',
          'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
        ),
         'constUses' => 
        array (
        ),
      )),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'canAccessNegeri',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Check if user can access data from a specific negeri.
     */',
             'namespace' => 'App\\Models\\Concerns',
             'uses' => 
            array (
              'homestay' => 'App\\Models\\Homestay',
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'negeri',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'canAccessCooperative',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Check if user can access data from a specific cooperative.
     */',
             'namespace' => 'App\\Models\\Concerns',
             'uses' => 
            array (
              'homestay' => 'App\\Models\\Homestay',
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'cooperativeId',
               'type' => 'int',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'canImport',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Check if user can perform data imports.
     */',
             'namespace' => 'App\\Models\\Concerns',
             'uses' => 
            array (
              'homestay' => 'App\\Models\\Homestay',
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'canExport',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Check if user can export data.
     */',
             'namespace' => 'App\\Models\\Concerns',
             'uses' => 
            array (
              'homestay' => 'App\\Models\\Homestay',
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'canManageSettings',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Check if user can manage system settings.
     */',
             'namespace' => 'App\\Models\\Concerns',
             'uses' => 
            array (
              'homestay' => 'App\\Models\\Homestay',
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        5 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'canManageUsers',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Check if user can manage users.
     */',
             'namespace' => 'App\\Models\\Concerns',
             'uses' => 
            array (
              'homestay' => 'App\\Models\\Homestay',
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        6 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getAccessibleHomestays',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get the homestays this user can access based on their scope.
     *
     * @return Builder<\\App\\Models\\Homestay>
     */',
             'namespace' => 'App\\Models\\Concerns',
             'uses' => 
            array (
              'homestay' => 'App\\Models\\Homestay',
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Builder',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\Concerns\\ManagesSystemSettings.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedTraitNode::__set_state(array(
       'name' => 'App\\Models\\Concerns\\ManagesSystemSettings',
       'phpDoc' => 
      \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
         'phpDocString' => '/**
 * Trait for handling SystemSetting scoped operations and value management.
 */',
         'namespace' => 'App\\Models\\Concerns',
         'uses' => 
        array (
          'systemsetting' => 'App\\Models\\SystemSetting',
        ),
         'constUses' => 
        array (
        ),
      )),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getValue',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get a setting value by key with optional scope.
     *
     * @param  mixed  $default
     * @return mixed
     */',
             'namespace' => 'App\\Models\\Concerns',
             'uses' => 
            array (
              'systemsetting' => 'App\\Models\\SystemSetting',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'key',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'scope',
               'type' => '?string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
            )),
            2 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'default',
               'type' => NULL,
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'setValue',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Set a setting value by key with optional scope.
     *
     * @param  mixed  $value
     */',
             'namespace' => 'App\\Models\\Concerns',
             'uses' => 
            array (
              'systemsetting' => 'App\\Models\\SystemSetting',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'App\\Models\\SystemSetting',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'key',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'value',
               'type' => NULL,
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            2 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'scope',
               'type' => '?string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getGlobal',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get a global setting value.
     *
     * @param  mixed  $default
     * @return mixed
     */',
             'namespace' => 'App\\Models\\Concerns',
             'uses' => 
            array (
              'systemsetting' => 'App\\Models\\SystemSetting',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'key',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'default',
               'type' => NULL,
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'setGlobal',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Set a global setting value.
     *
     * @param  mixed  $value
     */',
             'namespace' => 'App\\Models\\Concerns',
             'uses' => 
            array (
              'systemsetting' => 'App\\Models\\SystemSetting',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'App\\Models\\SystemSetting',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'key',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'value',
               'type' => NULL,
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'deleteSetting',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Delete a setting by key and scope.
     */',
             'namespace' => 'App\\Models\\Concerns',
             'uses' => 
            array (
              'systemsetting' => 'App\\Models\\SystemSetting',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'bool',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'key',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'scope',
               'type' => '?string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        5 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getForScope',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get all settings for a specific scope.
     *
     * @return array<string, mixed>
     */',
             'namespace' => 'App\\Models\\Concerns',
             'uses' => 
            array (
              'systemsetting' => 'App\\Models\\SystemSetting',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'array',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'scope',
               'type' => '?string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\Concerns\\ValidatesPerformanceData.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedTraitNode::__set_state(array(
       'name' => 'App\\Models\\Concerns\\ValidatesPerformanceData',
       'phpDoc' => 
      \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
         'phpDocString' => '/**
 * Performance Data Validation Trait
 *
 * Handles validation logic for performance data attributes
 * to reduce complexity in the main Performance model.
 */',
         'namespace' => 'App\\Models\\Concerns',
         'uses' => 
        array (
        ),
         'constUses' => 
        array (
        ),
      )),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'setBulanAttribute',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Ensure bulan is within valid range (1-12).
     */',
             'namespace' => 'App\\Models\\Concerns',
             'uses' => 
            array (
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'void',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'value',
               'type' => 'int|string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'setTahunAttribute',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Ensure tahun is within reasonable range.
     */',
             'namespace' => 'App\\Models\\Concerns',
             'uses' => 
            array (
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'void',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'value',
               'type' => 'int|string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'setPelawatDomestikAttribute',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Ensure pelawat_domestik is not negative.
     */',
             'namespace' => 'App\\Models\\Concerns',
             'uses' => 
            array (
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'void',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'value',
               'type' => 'int|string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'setPelawatAsingAttribute',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Ensure pelawat_asing is not negative.
     */',
             'namespace' => 'App\\Models\\Concerns',
             'uses' => 
            array (
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'void',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'value',
               'type' => 'int|string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'setPendapatanAttribute',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Ensure pendapatan is not negative.
     */',
             'namespace' => 'App\\Models\\Concerns',
             'uses' => 
            array (
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'void',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'value',
               'type' => 'float|int|string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        5 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'setSumberLainAttribute',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Ensure sumber_lain is not negative.
     */',
             'namespace' => 'App\\Models\\Concerns',
             'uses' => 
            array (
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'void',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'value',
               'type' => 'float|int|string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        6 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'validateMonth',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Validate month is within range 1-12.
     */',
             'namespace' => 'App\\Models\\Concerns',
             'uses' => 
            array (
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'int',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'month',
               'type' => 'int',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        7 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'validateYear',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Validate year is within reasonable range.
     */',
             'namespace' => 'App\\Models\\Concerns',
             'uses' => 
            array (
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'int',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'year',
               'type' => 'int',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        8 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'validateVisitorCount',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Validate visitor count is not negative.
     */',
             'namespace' => 'App\\Models\\Concerns',
             'uses' => 
            array (
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'int',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'count',
               'type' => 'int',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'fieldName',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        9 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'validateAmount',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Validate amount is numeric and not negative.
     */',
             'namespace' => 'App\\Models\\Concerns',
             'uses' => 
            array (
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'float',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'value',
               'type' => 'float|int|string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'fieldName',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\Cooperative.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Models\\Cooperative',
       'phpDoc' => 
      \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
         'phpDocString' => '/**
 * Cooperative Model
 *
 * Represents a cooperative organization that manages homestays.
 * Cooperatives are organized by state and can manage multiple homestays.
 *
 * @property int $id Primary key
 * @property string $nama Cooperative name
 * @property string $negeri State code (e.g., \'Selangor\', \'Johor\')
 * @property string|null $alamat Cooperative address
 * @property \\Carbon\\Carbon $created_at
 * @property \\Carbon\\Carbon $updated_at
 * @property \\Carbon\\Carbon|null $deleted_at
 * @property-read \\Illuminate\\Database\\Eloquent\\Collection<int,\\App\\Models\\Homestay> $homestays
 * @property-read int $jumlah_homestay Number of homestays managed
 * @property-read int $jumlah_homestay_aktif Number of active homestays
 *
 * @method static \\Database\\Factories\\CooperativeFactory factory(...$parameters)
 */',
         'namespace' => 'App\\Models',
         'uses' => 
        array (
          'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
          'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
          'model' => 'Illuminate\\Database\\Eloquent\\Model',
          'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
          'softdeletes' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
        ),
         'constUses' => 
        array (
        ),
      )),
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Database\\Eloquent\\Model',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
        1 => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'table',
          ),
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * The table associated with the model.
     *
     * @var string
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
              'softdeletes' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
            ),
             'constUses' => 
            array (
            ),
          )),
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'fillable',
          ),
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
              'softdeletes' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
            ),
             'constUses' => 
            array (
            ),
          )),
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'appends',
          ),
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * The accessors to append to the model\'s array form.
     *
     * @var list<string>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
              'softdeletes' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
            ),
             'constUses' => 
            array (
            ),
          )),
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'homestays',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get all homestays managed by this cooperative.
     *
     * @return HasMany<\\App\\Models\\Homestay, \\App\\Models\\Cooperative>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
              'softdeletes' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'scopeByNegeri',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Scope query to filter by negeri (state).
     *
     * @param  Builder<\\App\\Models\\Cooperative>  $query
     * @return Builder<\\App\\Models\\Cooperative>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
              'softdeletes' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Builder',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'query',
               'type' => 'Illuminate\\Database\\Eloquent\\Builder',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'negeri',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        5 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'scopeWithActiveHomestays',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Scope query to include cooperatives with active homestays.
     *
     * @param  Builder<\\App\\Models\\Cooperative>  $query
     * @return Builder<\\App\\Models\\Cooperative>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
              'softdeletes' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Builder',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'query',
               'type' => 'Illuminate\\Database\\Eloquent\\Builder',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        6 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getJumlahHomestayAttribute',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get the total number of homestays managed by this cooperative.
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
              'softdeletes' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'int',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        7 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getJumlahHomestayAktifAttribute',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get the number of active homestays managed by this cooperative.
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
              'softdeletes' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'int',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        8 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'setNegeriAttribute',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Set the negeri attribute to ensure consistent format.
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
              'softdeletes' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'void',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'value',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        9 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'setNamaAttribute',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Set the nama attribute to ensure proper formatting.
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
              'softdeletes' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'void',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'value',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        10 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'casts',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
              'softdeletes' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\Homestay.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Models\\Homestay',
       'phpDoc' => 
      \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
         'phpDocString' => '/**
 * Homestay Model
 *
 * Represents a homestay accommodation unit in the Malaysian homestay system.
 * Each homestay can be managed by a cooperative or individually.
 *
 * @property int $id Primary key
 * @property string $nama Homestay name
 * @property string $negeri State code (e.g., \'Selangor\', \'Johor\')
 * @property string|null $alamat Full address
 * @property int $kapasiti Maximum guest capacity
 * @property string|null $fasiliti Facilities description (JSON/Text)
 * @property string $model_pengurusan Management model (\'koperasi\', \'individu\')
 * @property int|null $id_koperasi Foreign key to cooperatives table
 * @property string $status Operation status (\'Aktif\', \'Tidak Aktif\')
 * @property int|null $cluster_id Foreign key to clusters table
 * @property \\Carbon\\Carbon $created_at
 * @property \\Carbon\\Carbon $updated_at
 * @property \\Carbon\\Carbon|null $deleted_at
 * @property-read \\App\\Models\\Cooperative|null $cooperative
 * @property-read \\App\\Models\\Cluster|null $cluster
 * @property-read \\Illuminate\\Database\\Eloquent\\Collection<int,\\App\\Models\\Performance> $performances
 * @property-read string $alamat_penuh Computed full address
 * @property-read int $total_pelawat_tahun_ini Total visitors this year
 * @property-read float $purata_pendapatan_bulanan Average monthly income
 *
 * @method static \\Database\\Factories\\HomestayFactory factory(...$parameters)
 */',
         'namespace' => 'App\\Models',
         'uses' => 
        array (
          'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
          'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
          'model' => 'Illuminate\\Database\\Eloquent\\Model',
          'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
          'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
          'softdeletes' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
          'db' => 'Illuminate\\Support\\Facades\\DB',
        ),
         'constUses' => 
        array (
        ),
      )),
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Database\\Eloquent\\Model',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
        1 => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'table',
          ),
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * The table associated with the model.
     *
     * @var string
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
              'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
              'softdeletes' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
              'db' => 'Illuminate\\Support\\Facades\\DB',
            ),
             'constUses' => 
            array (
            ),
          )),
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'fillable',
          ),
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
              'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
              'softdeletes' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
              'db' => 'Illuminate\\Support\\Facades\\DB',
            ),
             'constUses' => 
            array (
            ),
          )),
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'appends',
          ),
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * The accessors to append to the model\'s array form.
     *
     * @var list<string>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
              'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
              'softdeletes' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
              'db' => 'Illuminate\\Support\\Facades\\DB',
            ),
             'constUses' => 
            array (
            ),
          )),
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'cooperative',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get the cooperative that manages this homestay.
     *
     * @return BelongsTo<\\App\\Models\\Cooperative, \\App\\Models\\Homestay>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
              'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
              'softdeletes' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
              'db' => 'Illuminate\\Support\\Facades\\DB',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'cluster',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get the cluster this homestay belongs to.
     *
     * @return BelongsTo<\\App\\Models\\Cluster, \\App\\Models\\Homestay>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
              'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
              'softdeletes' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
              'db' => 'Illuminate\\Support\\Facades\\DB',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        5 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'performances',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get all performance records for this homestay.
     *
     * @return HasMany<\\App\\Models\\Performance, \\App\\Models\\Homestay>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
              'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
              'softdeletes' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
              'db' => 'Illuminate\\Support\\Facades\\DB',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        6 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'scopeActive',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Scope query to only include active homestays.
     *
     * @param  Builder<\\App\\Models\\Homestay>  $query
     * @return Builder<\\App\\Models\\Homestay>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
              'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
              'softdeletes' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
              'db' => 'Illuminate\\Support\\Facades\\DB',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Builder',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'query',
               'type' => 'Illuminate\\Database\\Eloquent\\Builder',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        7 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'scopeByNegeri',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Scope query to filter by negeri (state).
     *
     * @param  Builder<\\App\\Models\\Homestay>  $query
     * @return Builder<\\App\\Models\\Homestay>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
              'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
              'softdeletes' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
              'db' => 'Illuminate\\Support\\Facades\\DB',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Builder',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'query',
               'type' => 'Illuminate\\Database\\Eloquent\\Builder',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'negeri',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        8 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'scopeByKoperasi',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Scope query to filter by cooperative.
     *
     * @param  Builder<\\App\\Models\\Homestay>  $query
     * @return Builder<\\App\\Models\\Homestay>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
              'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
              'softdeletes' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
              'db' => 'Illuminate\\Support\\Facades\\DB',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Builder',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'query',
               'type' => 'Illuminate\\Database\\Eloquent\\Builder',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'koperasiId',
               'type' => 'int',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        9 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'scopeByModelPengurusan',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Scope query to filter by management model.
     *
     * @param  Builder<\\App\\Models\\Homestay>  $query
     * @return Builder<\\App\\Models\\Homestay>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
              'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
              'softdeletes' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
              'db' => 'Illuminate\\Support\\Facades\\DB',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Builder',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'query',
               'type' => 'Illuminate\\Database\\Eloquent\\Builder',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'model',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        10 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'scopeKoperasi',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Scope query to include cooperative-managed homestays only.
     *
     * @param  Builder<\\App\\Models\\Homestay>  $query
     * @return Builder<\\App\\Models\\Homestay>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
              'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
              'softdeletes' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
              'db' => 'Illuminate\\Support\\Facades\\DB',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Builder',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'query',
               'type' => 'Illuminate\\Database\\Eloquent\\Builder',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        11 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'scopeIndividu',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Scope query to include individually-managed homestays only.
     *
     * @param  Builder<\\App\\Models\\Homestay>  $query
     * @return Builder<\\App\\Models\\Homestay>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
              'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
              'softdeletes' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
              'db' => 'Illuminate\\Support\\Facades\\DB',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Builder',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'query',
               'type' => 'Illuminate\\Database\\Eloquent\\Builder',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        12 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'scopeByCluster',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Scope query to filter by cluster.
     *
     * @param  Builder<\\App\\Models\\Homestay>  $query
     * @return Builder<\\App\\Models\\Homestay>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
              'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
              'softdeletes' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
              'db' => 'Illuminate\\Support\\Facades\\DB',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Builder',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'query',
               'type' => 'Illuminate\\Database\\Eloquent\\Builder',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'clusterId',
               'type' => 'int',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        13 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getAlamatPenuhAttribute',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get the formatted full address.
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
              'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
              'softdeletes' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
              'db' => 'Illuminate\\Support\\Facades\\DB',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'string',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        14 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getTotalPelawatTahunIniAttribute',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get total visitors for current year.
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
              'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
              'softdeletes' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
              'db' => 'Illuminate\\Support\\Facades\\DB',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'int',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        15 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getPurataPendapatanBulananAttribute',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get average monthly income (last 12 months).
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
              'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
              'softdeletes' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
              'db' => 'Illuminate\\Support\\Facades\\DB',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'float',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        16 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'setNegeriAttribute',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Set the negeri attribute to ensure consistent format.
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
              'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
              'softdeletes' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
              'db' => 'Illuminate\\Support\\Facades\\DB',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'void',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'value',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        17 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'setNamaAttribute',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Set the nama attribute to ensure proper formatting.
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
              'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
              'softdeletes' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
              'db' => 'Illuminate\\Support\\Facades\\DB',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'void',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'value',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        18 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'casts',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
              'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
              'softdeletes' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
              'db' => 'Illuminate\\Support\\Facades\\DB',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\Import.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Models\\Import',
       'phpDoc' => 
      \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
         'phpDocString' => '/**
 * Import Model
 *
 * Represents a data import session (Excel/CSV files) with tracking and metadata.
 * Used for importing homestays, performances, and other bulk data operations.
 *
 * @property int $id Primary key
 * @property int $user_id Foreign key to users table (who initiated the import)
 * @property string $type Import type (e.g., \'homestays\', \'performances\')
 * @property string|null $filename Original filename
 * @property string $status Import status (\'queued\', \'processing\', \'completed\', \'failed\')
 * @property int $rows_total Total rows in import file
 * @property int $rows_processed Rows processed so far
 * @property int $rows_success Successfully imported rows
 * @property int $rows_failed Failed rows
 * @property array<string, mixed>|null $meta Metadata including errors, mapping, validation results
 * @property \\Carbon\\Carbon $created_at
 * @property \\Carbon\\Carbon $updated_at
 * @property-read \\App\\Models\\User $user
 * @property-read float $progress_percentage Progress as percentage (0-100)
 * @property-read bool $is_completed Whether import is completed
 * @property-read bool $is_failed Whether import failed
 * @property-read bool $is_processing Whether import is currently processing
 *
 * @method static \\Database\\Factories\\ImportFactory factory(...$parameters)
 */',
         'namespace' => 'App\\Models',
         'uses' => 
        array (
          'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
          'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
          'model' => 'Illuminate\\Database\\Eloquent\\Model',
          'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
        ),
         'constUses' => 
        array (
        ),
      )),
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Database\\Eloquent\\Model',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'table',
          ),
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * The table associated with the model.
     *
     * @var string
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
            ),
             'constUses' => 
            array (
            ),
          )),
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'fillable',
          ),
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
            ),
             'constUses' => 
            array (
            ),
          )),
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'appends',
          ),
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * The accessors to append to the model\'s array form.
     *
     * @var list<string>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
            ),
             'constUses' => 
            array (
            ),
          )),
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'user',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get the user who initiated this import.
     *
     * @return BelongsTo<\\App\\Models\\User, \\App\\Models\\Import>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'scopeByType',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Scope query to filter by import type.
     *
     * @param  Builder<\\App\\Models\\Import>  $query
     * @return Builder<\\App\\Models\\Import>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Builder',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'query',
               'type' => 'Illuminate\\Database\\Eloquent\\Builder',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'type',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        5 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'scopeByStatus',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Scope query to filter by status.
     *
     * @param  Builder<\\App\\Models\\Import>  $query
     * @return Builder<\\App\\Models\\Import>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Builder',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'query',
               'type' => 'Illuminate\\Database\\Eloquent\\Builder',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'status',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        6 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'scopeCompleted',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Scope query to include only completed imports.
     *
     * @param  Builder<\\App\\Models\\Import>  $query
     * @return Builder<\\App\\Models\\Import>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Builder',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'query',
               'type' => 'Illuminate\\Database\\Eloquent\\Builder',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        7 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'scopeFailed',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Scope query to include only failed imports.
     *
     * @param  Builder<\\App\\Models\\Import>  $query
     * @return Builder<\\App\\Models\\Import>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Builder',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'query',
               'type' => 'Illuminate\\Database\\Eloquent\\Builder',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        8 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'scopeProcessing',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Scope query to include only processing imports.
     *
     * @param  Builder<\\App\\Models\\Import>  $query
     * @return Builder<\\App\\Models\\Import>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Builder',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'query',
               'type' => 'Illuminate\\Database\\Eloquent\\Builder',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        9 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'scopeQueued',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Scope query to include queued imports.
     *
     * @param  Builder<\\App\\Models\\Import>  $query
     * @return Builder<\\App\\Models\\Import>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Builder',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'query',
               'type' => 'Illuminate\\Database\\Eloquent\\Builder',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        10 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'scopeByUser',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Scope query to filter by user.
     *
     * @param  Builder<\\App\\Models\\Import>  $query
     * @return Builder<\\App\\Models\\Import>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Builder',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'query',
               'type' => 'Illuminate\\Database\\Eloquent\\Builder',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'userId',
               'type' => 'int',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        11 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'scopeRecent',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Scope query to order by newest first.
     *
     * @param  Builder<\\App\\Models\\Import>  $query
     * @return Builder<\\App\\Models\\Import>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Builder',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'query',
               'type' => 'Illuminate\\Database\\Eloquent\\Builder',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        12 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getProgressPercentageAttribute',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get the import progress as percentage (0-100).
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'float',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        13 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getIsCompletedAttribute',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Check if the import is completed.
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        14 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getIsFailedAttribute',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Check if the import failed.
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        15 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getIsProcessingAttribute',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Check if the import is currently processing.
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        16 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'setTypeAttribute',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Set the type attribute to ensure lowercase format.
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'void',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'value',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        17 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'setFilenameAttribute',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Set the filename attribute to ensure proper formatting.
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'void',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'value',
               'type' => '?string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        18 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'markAsProcessing',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Mark the import as processing.
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        19 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'markAsCompleted',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Mark the import as completed.
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        20 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'markAsFailed',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Mark the import as failed.
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        21 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'updateProgress',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Update the progress counters.
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'processed',
               'type' => 'int',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'success',
               'type' => 'int',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            2 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'failed',
               'type' => 'int',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        22 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'addError',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @param  array<string, mixed>|null  $context
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'error',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'context',
               'type' => '?array',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        23 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getValidationErrors',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get validation errors from meta data.
     *
     * @return array<array<string, mixed>>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        24 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'setValidationErrors',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Set validation errors in meta data.
     *
     * @param  array<array<string, mixed>>  $errors
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'errors',
               'type' => 'array',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        25 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'casts',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\LaporanTerjadual.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Models\\LaporanTerjadual',
       'phpDoc' => 
      \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
         'phpDocString' => '/**
 * LaporanTerjadual Model
 *
 * Represents scheduled reports that are automatically generated and sent
 * to specified recipients based on configured frequency and filters.
 *
 * @property int $id Primary key
 * @property int $user_id Foreign key to users table (who created the schedule)
 * @property string $nama Report name
 * @property string $format Output format (\'pdf\', \'xlsx\', \'csv\')
 * @property string $frekuensi Frequency (\'daily\', \'weekly\', \'monthly\', \'cron\')
 * @property string|null $cron_expression Cron expression for custom frequency
 * @property array<string, mixed>|null $filters Report filters (negeri, koperasi, date range)
 * @property list<string>|null $recipients List of email recipients
 * @property string $status Status (\'aktif\', \'nyahaktif\')
 * @property \\Carbon\\Carbon|null $last_run_at Last execution timestamp
 * @property \\Carbon\\Carbon $created_at
 * @property \\Carbon\\Carbon $updated_at
 * @property-read \\App\\Models\\User $user
 * @property-read bool $is_active Whether the schedule is active
 * @property-read \\Carbon\\Carbon|null $next_run_at Next scheduled execution time
 * @property-read bool $is_due Whether the report is due to run
 *
 * @method static \\Database\\Factories\\LaporanTerjadualFactory factory(...$parameters)
 */',
         'namespace' => 'App\\Models',
         'uses' => 
        array (
          'carbon' => 'Carbon\\Carbon',
          'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
          'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
          'model' => 'Illuminate\\Database\\Eloquent\\Model',
          'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
          'log' => 'Illuminate\\Support\\Facades\\Log',
        ),
         'constUses' => 
        array (
        ),
      )),
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Database\\Eloquent\\Model',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'table',
          ),
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * The table associated with the model.
     *
     * @var string
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'carbon' => 'Carbon\\Carbon',
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
              'log' => 'Illuminate\\Support\\Facades\\Log',
            ),
             'constUses' => 
            array (
            ),
          )),
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'fillable',
          ),
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'carbon' => 'Carbon\\Carbon',
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
              'log' => 'Illuminate\\Support\\Facades\\Log',
            ),
             'constUses' => 
            array (
            ),
          )),
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'appends',
          ),
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * The accessors to append to the model\'s array form.
     *
     * @var list<string>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'carbon' => 'Carbon\\Carbon',
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
              'log' => 'Illuminate\\Support\\Facades\\Log',
            ),
             'constUses' => 
            array (
            ),
          )),
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'user',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get the user who created this scheduled report.
     *
     * @return BelongsTo<\\App\\Models\\User, \\App\\Models\\LaporanTerjadual>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'carbon' => 'Carbon\\Carbon',
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
              'log' => 'Illuminate\\Support\\Facades\\Log',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'scopeActive',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Scope query to include only active reports.
     *
     * @param  Builder<\\App\\Models\\LaporanTerjadual>  $query
     * @return Builder<\\App\\Models\\LaporanTerjadual>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'carbon' => 'Carbon\\Carbon',
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
              'log' => 'Illuminate\\Support\\Facades\\Log',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Builder',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'query',
               'type' => 'Illuminate\\Database\\Eloquent\\Builder',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        5 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'scopeInactive',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Scope query to include only inactive reports.
     *
     * @param  Builder<\\App\\Models\\LaporanTerjadual>  $query
     * @return Builder<\\App\\Models\\LaporanTerjadual>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'carbon' => 'Carbon\\Carbon',
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
              'log' => 'Illuminate\\Support\\Facades\\Log',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Builder',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'query',
               'type' => 'Illuminate\\Database\\Eloquent\\Builder',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        6 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'scopeByFormat',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Scope query to filter by format.
     *
     * @param  Builder<\\App\\Models\\LaporanTerjadual>  $query
     * @return Builder<\\App\\Models\\LaporanTerjadual>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'carbon' => 'Carbon\\Carbon',
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
              'log' => 'Illuminate\\Support\\Facades\\Log',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Builder',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'query',
               'type' => 'Illuminate\\Database\\Eloquent\\Builder',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'format',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        7 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'scopeByFrekuensi',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Scope query to filter by frequency.
     *
     * @param  Builder<\\App\\Models\\LaporanTerjadual>  $query
     * @return Builder<\\App\\Models\\LaporanTerjadual>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'carbon' => 'Carbon\\Carbon',
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
              'log' => 'Illuminate\\Support\\Facades\\Log',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Builder',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'query',
               'type' => 'Illuminate\\Database\\Eloquent\\Builder',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'frekuensi',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        8 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'scopeByUser',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Scope query to filter by user.
     *
     * @param  Builder<\\App\\Models\\LaporanTerjadual>  $query
     * @return Builder<\\App\\Models\\LaporanTerjadual>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'carbon' => 'Carbon\\Carbon',
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
              'log' => 'Illuminate\\Support\\Facades\\Log',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Builder',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'query',
               'type' => 'Illuminate\\Database\\Eloquent\\Builder',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'userId',
               'type' => 'int',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        9 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'scopeDue',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Scope query to include reports that are due to run.
     *
     * @param  Builder<\\App\\Models\\LaporanTerjadual>  $query
     * @return Builder<\\App\\Models\\LaporanTerjadual>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'carbon' => 'Carbon\\Carbon',
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
              'log' => 'Illuminate\\Support\\Facades\\Log',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Builder',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'query',
               'type' => 'Illuminate\\Database\\Eloquent\\Builder',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        10 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getIsActiveAttribute',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Check if the scheduled report is active.
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'carbon' => 'Carbon\\Carbon',
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
              'log' => 'Illuminate\\Support\\Facades\\Log',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        11 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getNextRunAtAttribute',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get the next scheduled run time.
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'carbon' => 'Carbon\\Carbon',
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
              'log' => 'Illuminate\\Support\\Facades\\Log',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => '?Carbon\\Carbon',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        12 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getIsDueAttribute',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Check if the report is due to run.
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'carbon' => 'Carbon\\Carbon',
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
              'log' => 'Illuminate\\Support\\Facades\\Log',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        13 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'markAsExecuted',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Mark the report as executed.
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'carbon' => 'Carbon\\Carbon',
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
              'log' => 'Illuminate\\Support\\Facades\\Log',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        14 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'activate',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Activate the scheduled report.
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'carbon' => 'Carbon\\Carbon',
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
              'log' => 'Illuminate\\Support\\Facades\\Log',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        15 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'deactivate',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Deactivate the scheduled report.
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'carbon' => 'Carbon\\Carbon',
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
              'log' => 'Illuminate\\Support\\Facades\\Log',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        16 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getEmailRecipients',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get the email recipients as an array.
     *
     * @return array<string>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'carbon' => 'Carbon\\Carbon',
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
              'log' => 'Illuminate\\Support\\Facades\\Log',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        17 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'addRecipient',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Add an email recipient.
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'carbon' => 'Carbon\\Carbon',
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
              'log' => 'Illuminate\\Support\\Facades\\Log',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'email',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        18 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'removeRecipient',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Remove an email recipient.
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'carbon' => 'Carbon\\Carbon',
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
              'log' => 'Illuminate\\Support\\Facades\\Log',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'email',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        19 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getReportFilters',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get the report filters.
     *
     * @return array<string, mixed>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'carbon' => 'Carbon\\Carbon',
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
              'log' => 'Illuminate\\Support\\Facades\\Log',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        20 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'updateFilters',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Update report filters.
     *
     * @param  array<string, mixed>  $filters
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'carbon' => 'Carbon\\Carbon',
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
              'log' => 'Illuminate\\Support\\Facades\\Log',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'filters',
               'type' => 'array',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        21 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'setNamaAttribute',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Set the nama attribute to ensure proper formatting.
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'carbon' => 'Carbon\\Carbon',
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
              'log' => 'Illuminate\\Support\\Facades\\Log',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'void',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'value',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        22 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'setFormatAttribute',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Set the format attribute to ensure lowercase.
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'carbon' => 'Carbon\\Carbon',
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
              'log' => 'Illuminate\\Support\\Facades\\Log',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'void',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'value',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        23 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'setFrekuensiAttribute',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Set the frekuensi attribute to ensure valid value.
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'carbon' => 'Carbon\\Carbon',
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
              'log' => 'Illuminate\\Support\\Facades\\Log',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'void',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'value',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        24 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'casts',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'carbon' => 'Carbon\\Carbon',
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
              'log' => 'Illuminate\\Support\\Facades\\Log',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\Performance.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Models\\Performance',
       'phpDoc' => 
      \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
         'phpDocString' => '/**
 * Performance Model
 *
 * Represents monthly performance data for a homestay.
 * This is the fact table in the star schema design containing visitor and revenue metrics.
 *
 * @property int $id Primary key
 * @property int $homestay_id Foreign key to homestays table
 * @property int $bulan Month (1-12)
 * @property int $tahun Year
 * @property int $pelawat_domestik Domestic visitors count
 * @property int $pelawat_asing Foreign visitors count
 * @property float $pendapatan Primary income (MYR)
 * @property float $sumber_lain Other income sources (MYR)
 * @property \\Carbon\\Carbon $created_at
 * @property \\Carbon\\Carbon $updated_at
 * @property-read \\App\\Models\\Homestay $homestay
 * @property-read int $total_pelawat Total visitors (domestic + foreign)
 * @property-read float $total_pendapatan Total income (pendapatan + sumber_lain)
 * @property-read string $bulan_tahun Formatted month-year (e.g., "October 2025")
 *
 * @method static \\Database\\Factories\\PerformanceFactory factory(...$parameters)
 */',
         'namespace' => 'App\\Models',
         'uses' => 
        array (
          'validatesperformancedata' => 'App\\Models\\Concerns\\ValidatesPerformanceData',
          'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
          'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
          'model' => 'Illuminate\\Database\\Eloquent\\Model',
          'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
        ),
         'constUses' => 
        array (
        ),
      )),
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Database\\Eloquent\\Model',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
        1 => 'App\\Models\\Concerns\\ValidatesPerformanceData',
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'table',
          ),
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * The table associated with the model.
     *
     * @var string
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'validatesperformancedata' => 'App\\Models\\Concerns\\ValidatesPerformanceData',
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
            ),
             'constUses' => 
            array (
            ),
          )),
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'fillable',
          ),
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'validatesperformancedata' => 'App\\Models\\Concerns\\ValidatesPerformanceData',
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
            ),
             'constUses' => 
            array (
            ),
          )),
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'appends',
          ),
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * The accessors to append to the model\'s array form.
     *
     * @var list<string>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'validatesperformancedata' => 'App\\Models\\Concerns\\ValidatesPerformanceData',
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
            ),
             'constUses' => 
            array (
            ),
          )),
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'homestay',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get the homestay that this performance record belongs to.
     *
     * @return BelongsTo<\\App\\Models\\Homestay, \\App\\Models\\Performance>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'validatesperformancedata' => 'App\\Models\\Concerns\\ValidatesPerformanceData',
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'scopeByTahun',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Scope query to filter by year.
     *
     * @param  Builder<self>  $query
     * @return Builder<self>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'validatesperformancedata' => 'App\\Models\\Concerns\\ValidatesPerformanceData',
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Builder',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'query',
               'type' => 'Illuminate\\Database\\Eloquent\\Builder',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'tahun',
               'type' => 'int',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        5 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'scopeByBulan',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Scope query to filter by month.
     *
     * @param  Builder<self>  $query
     * @return Builder<self>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'validatesperformancedata' => 'App\\Models\\Concerns\\ValidatesPerformanceData',
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Builder',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'query',
               'type' => 'Illuminate\\Database\\Eloquent\\Builder',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'bulan',
               'type' => 'int',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        6 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'scopeByPeriod',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Scope query to filter by year and month.
     *
     * @param  Builder<self>  $query
     * @return Builder<self>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'validatesperformancedata' => 'App\\Models\\Concerns\\ValidatesPerformanceData',
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Builder',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'query',
               'type' => 'Illuminate\\Database\\Eloquent\\Builder',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'tahun',
               'type' => 'int',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            2 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'bulan',
               'type' => 'int',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        7 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'scopeCurrentYear',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Scope query to filter by current year.
     *
     * @param  Builder<self>  $query
     * @return Builder<self>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'validatesperformancedata' => 'App\\Models\\Concerns\\ValidatesPerformanceData',
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Builder',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'query',
               'type' => 'Illuminate\\Database\\Eloquent\\Builder',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        8 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'scopePreviousYear',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Scope query to filter by previous year.
     *
     * @param  Builder<self>  $query
     * @return Builder<self>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'validatesperformancedata' => 'App\\Models\\Concerns\\ValidatesPerformanceData',
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Builder',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'query',
               'type' => 'Illuminate\\Database\\Eloquent\\Builder',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        9 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'scopeBetweenPeriods',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Scope query to filter by date range.
     *
     * @param  Builder<self>  $query
     * @return Builder<self>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'validatesperformancedata' => 'App\\Models\\Concerns\\ValidatesPerformanceData',
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Builder',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'query',
               'type' => 'Illuminate\\Database\\Eloquent\\Builder',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'fromYear',
               'type' => 'int',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            2 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'fromMonth',
               'type' => 'int',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            3 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'toYear',
               'type' => 'int',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            4 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'toMonth',
               'type' => 'int',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        10 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'scopeWithHomestay',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Scope query to include homestay relationship data.
     *
     * @param  Builder<self>  $query
     * @return Builder<self>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'validatesperformancedata' => 'App\\Models\\Concerns\\ValidatesPerformanceData',
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Builder',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'query',
               'type' => 'Illuminate\\Database\\Eloquent\\Builder',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        11 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'scopeByNegeri',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Scope query to filter by negeri through homestay relationship.
     *
     * @param  Builder<self>  $query
     * @return Builder<self>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'validatesperformancedata' => 'App\\Models\\Concerns\\ValidatesPerformanceData',
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Builder',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'query',
               'type' => 'Illuminate\\Database\\Eloquent\\Builder',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'negeri',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        12 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getTotalPelawatAttribute',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get the total number of visitors (domestic + foreign).
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'validatesperformancedata' => 'App\\Models\\Concerns\\ValidatesPerformanceData',
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'int',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        13 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getTotalPendapatanAttribute',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get the total income (pendapatan + sumber_lain).
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'validatesperformancedata' => 'App\\Models\\Concerns\\ValidatesPerformanceData',
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'float',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        14 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getBulanTahunAttribute',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get formatted month-year string.
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'validatesperformancedata' => 'App\\Models\\Concerns\\ValidatesPerformanceData',
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'string',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        15 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'casts',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'validatesperformancedata' => 'App\\Models\\Concerns\\ValidatesPerformanceData',
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\SystemSetting.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Models\\SystemSetting',
       'phpDoc' => 
      \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
         'phpDocString' => '/**
 * SystemSetting Model
 *
 * Represents application-wide configuration settings with optional scoping.
 * Supports JSON values and hierarchical scoping (global, negeri, koperasi).
 *
 * @property int $id Primary key
 * @property string $key Setting key identifier
 * @property mixed $value Setting value (JSON decoded)
 * @property string|null $scope Setting scope (global, negeri:Selangor, koperasi:123)
 * @property \\Carbon\\Carbon $created_at
 * @property \\Carbon\\Carbon $updated_at
 * @property-read bool $is_global Whether setting is global scope
 * @property-read string|null $scope_type Scope type (null, \'negeri\', \'koperasi\')
 * @property-read string|null $scope_value Scope value (state name, cooperative ID)
 *
 * @method static \\Database\\Factories\\SystemSettingFactory factory(...$parameters)
 */',
         'namespace' => 'App\\Models',
         'uses' => 
        array (
          'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
          'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
          'model' => 'Illuminate\\Database\\Eloquent\\Model',
        ),
         'constUses' => 
        array (
        ),
      )),
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Database\\Eloquent\\Model',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'table',
          ),
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * The table associated with the model.
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
            ),
             'constUses' => 
            array (
            ),
          )),
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'fillable',
          ),
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
            ),
             'constUses' => 
            array (
            ),
          )),
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'casts',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'appends',
          ),
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * The accessors to append to the model\'s array form.
     *
     * @var list<string>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
            ),
             'constUses' => 
            array (
            ),
          )),
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'scopeByKey',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Scope query to filter by key.
     *
     * @param  Builder<self>  $query
     * @return Builder<self>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Builder',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'query',
               'type' => 'Illuminate\\Database\\Eloquent\\Builder',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'key',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        5 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'scopeByScope',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Scope query to filter by scope.
     *
     * @param  Builder<self>  $query
     * @return Builder<self>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Builder',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'query',
               'type' => 'Illuminate\\Database\\Eloquent\\Builder',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'scope',
               'type' => '?string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        6 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'scopeGlobal',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Scope query to include only global settings.
     *
     * @param  Builder<self>  $query
     * @return Builder<self>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Builder',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'query',
               'type' => 'Illuminate\\Database\\Eloquent\\Builder',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        7 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'scopeByNegeri',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Scope query to filter by negeri scope.
     *
     * @param  Builder<self>  $query
     * @return Builder<self>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Builder',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'query',
               'type' => 'Illuminate\\Database\\Eloquent\\Builder',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'negeri',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        8 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'scopeByKoperasi',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Scope query to filter by koperasi scope.
     *
     * @param  Builder<self>  $query
     * @return Builder<self>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Builder',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'query',
               'type' => 'Illuminate\\Database\\Eloquent\\Builder',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'koperasiId',
               'type' => 'int',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        9 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getIsGlobalAttribute',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Check if this setting has global scope.
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        10 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getScopeTypeAttribute',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get the scope type (null, \'negeri\', \'koperasi\').
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => '?string',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        11 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getScopeValueAttribute',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get the scope value (state name, cooperative ID).
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => '?string',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        12 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getValue',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get a setting value by key with optional scope.
     *
     * @param  mixed  $default
     * @return mixed
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'key',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'scope',
               'type' => '?string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
            )),
            2 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'default',
               'type' => NULL,
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        13 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'setValue',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Set a setting value by key with optional scope.
     *
     * @param  mixed  $value
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'App\\Models\\SystemSetting',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'key',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'value',
               'type' => NULL,
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            2 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'scope',
               'type' => '?string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        14 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getGlobal',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get a global setting value.
     *
     * @param  mixed  $default
     * @return mixed
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'key',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'default',
               'type' => NULL,
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        15 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'setGlobal',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Set a global setting value.
     *
     * @param  mixed  $value
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'App\\Models\\SystemSetting',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'key',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'value',
               'type' => NULL,
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        16 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getNegeri',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get a negeri-scoped setting value.
     *
     * @param  mixed  $default
     * @return mixed
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'key',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'negeri',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            2 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'default',
               'type' => NULL,
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        17 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'setNegeri',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Set a negeri-scoped setting value.
     *
     * @param  mixed  $value
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'App\\Models\\SystemSetting',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'key',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'value',
               'type' => NULL,
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            2 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'negeri',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        18 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getKoperasi',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get a koperasi-scoped setting value.
     *
     * @param  mixed  $default
     * @return mixed
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'key',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'koperasiId',
               'type' => 'int',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            2 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'default',
               'type' => NULL,
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        19 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'setKoperasi',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Set a koperasi-scoped setting value.
     *
     * @param  mixed  $value
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'App\\Models\\SystemSetting',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'key',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'value',
               'type' => NULL,
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            2 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'koperasiId',
               'type' => 'int',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        20 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'deleteSetting',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Delete a setting by key and scope.
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'bool',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'key',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'scope',
               'type' => '?string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        21 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getForScope',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get all settings for a specific scope.
     *
     * @return array<string, mixed>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'array',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'scope',
               'type' => '?string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Models\\User.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Models\\User',
       'phpDoc' => 
      \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
         'phpDocString' => '/**
 * User Model
 *
 * Represents a system user with role-based access control and scoping.
 * Users can be scoped to specific negeri (states) and cooperatives.
 *
 * @property int $id Primary key
 * @property string $name User full name
 * @property string $email Email address (unique)
 * @property string|null $negeri State/negeri scope
 * @property int|null $cooperative_id Foreign key to cooperatives table
 * @property \\Carbon\\Carbon|null $email_verified_at
 * @property string $password Hashed password
 * @property \\Carbon\\Carbon $created_at
 * @property \\Carbon\\Carbon $updated_at
 * @property-read \\App\\Models\\Cooperative|null $cooperative
 * @property-read \\Illuminate\\Database\\Eloquent\\Collection<int,\\App\\Models\\Import> $imports
 * @property-read \\Illuminate\\Database\\Eloquent\\Collection<int,\\App\\Models\\AuditLog> $auditLogs
 * @property-read \\Illuminate\\Database\\Eloquent\\Collection<int,\\App\\Models\\LaporanTerjadual> $laporanTerjadual
 * @property-read bool $is_admin Whether user has admin role
 * @property-read bool $is_analyst Whether user has analyst role
 * @property-read string $role_display Human-readable role name
 *
 * @method static \\Database\\Factories\\UserFactory factory(...$parameters)
 */',
         'namespace' => 'App\\Models',
         'uses' => 
        array (
          'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
          'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
          'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
          'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
          'authenticatable' => 'Illuminate\\Foundation\\Auth\\User',
          'notifiable' => 'Illuminate\\Notifications\\Notifiable',
          'hasroles' => 'Spatie\\Permission\\Traits\\HasRoles',
        ),
         'constUses' => 
        array (
        ),
      )),
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Foundation\\Auth\\User',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
        1 => 'Spatie\\Permission\\Traits\\HasRoles',
        2 => 'Illuminate\\Notifications\\Notifiable',
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'fillable',
          ),
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
              'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
              'authenticatable' => 'Illuminate\\Foundation\\Auth\\User',
              'notifiable' => 'Illuminate\\Notifications\\Notifiable',
              'hasroles' => 'Spatie\\Permission\\Traits\\HasRoles',
            ),
             'constUses' => 
            array (
            ),
          )),
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'hidden',
          ),
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
              'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
              'authenticatable' => 'Illuminate\\Foundation\\Auth\\User',
              'notifiable' => 'Illuminate\\Notifications\\Notifiable',
              'hasroles' => 'Spatie\\Permission\\Traits\\HasRoles',
            ),
             'constUses' => 
            array (
            ),
          )),
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'casts',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
              'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
              'authenticatable' => 'Illuminate\\Foundation\\Auth\\User',
              'notifiable' => 'Illuminate\\Notifications\\Notifiable',
              'hasroles' => 'Spatie\\Permission\\Traits\\HasRoles',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'appends',
          ),
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * The accessors to append to the model\'s array form.
     *
     * @var list<string>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
              'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
              'authenticatable' => 'Illuminate\\Foundation\\Auth\\User',
              'notifiable' => 'Illuminate\\Notifications\\Notifiable',
              'hasroles' => 'Spatie\\Permission\\Traits\\HasRoles',
            ),
             'constUses' => 
            array (
            ),
          )),
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'cooperative',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get the cooperative this user belongs to.
     *
     * @return BelongsTo<\\App\\Models\\Cooperative, \\App\\Models\\User>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
              'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
              'authenticatable' => 'Illuminate\\Foundation\\Auth\\User',
              'notifiable' => 'Illuminate\\Notifications\\Notifiable',
              'hasroles' => 'Spatie\\Permission\\Traits\\HasRoles',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        5 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'imports',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get all imports initiated by this user.
     *
     * @return HasMany<\\App\\Models\\Import, \\App\\Models\\User>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
              'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
              'authenticatable' => 'Illuminate\\Foundation\\Auth\\User',
              'notifiable' => 'Illuminate\\Notifications\\Notifiable',
              'hasroles' => 'Spatie\\Permission\\Traits\\HasRoles',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        6 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'auditLogs',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get all audit logs created by this user.
     *
     * @return HasMany<\\App\\Models\\AuditLog, \\App\\Models\\User>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
              'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
              'authenticatable' => 'Illuminate\\Foundation\\Auth\\User',
              'notifiable' => 'Illuminate\\Notifications\\Notifiable',
              'hasroles' => 'Spatie\\Permission\\Traits\\HasRoles',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        7 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'laporanTerjadual',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get all scheduled reports created by this user.
     *
     * @return HasMany<\\App\\Models\\LaporanTerjadual, \\App\\Models\\User>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
              'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
              'authenticatable' => 'Illuminate\\Foundation\\Auth\\User',
              'notifiable' => 'Illuminate\\Notifications\\Notifiable',
              'hasroles' => 'Spatie\\Permission\\Traits\\HasRoles',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        8 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'scopeByNegeri',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Scope query to filter by negeri (state).
     *
     * @param  Builder<self>  $query
     * @return Builder<self>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
              'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
              'authenticatable' => 'Illuminate\\Foundation\\Auth\\User',
              'notifiable' => 'Illuminate\\Notifications\\Notifiable',
              'hasroles' => 'Spatie\\Permission\\Traits\\HasRoles',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Builder',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'query',
               'type' => 'Illuminate\\Database\\Eloquent\\Builder',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'negeri',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        9 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'scopeByCooperative',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Scope query to filter by cooperative.
     *
     * @param  Builder<self>  $query
     * @return Builder<self>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
              'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
              'authenticatable' => 'Illuminate\\Foundation\\Auth\\User',
              'notifiable' => 'Illuminate\\Notifications\\Notifiable',
              'hasroles' => 'Spatie\\Permission\\Traits\\HasRoles',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Builder',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'query',
               'type' => 'Illuminate\\Database\\Eloquent\\Builder',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'cooperativeId',
               'type' => 'int',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        10 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'scopeAdmins',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Scope query to include only admin users.
     *
     * @param  Builder<self>  $query
     * @return Builder<self>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
              'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
              'authenticatable' => 'Illuminate\\Foundation\\Auth\\User',
              'notifiable' => 'Illuminate\\Notifications\\Notifiable',
              'hasroles' => 'Spatie\\Permission\\Traits\\HasRoles',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Builder',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'query',
               'type' => 'Illuminate\\Database\\Eloquent\\Builder',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        11 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'scopeAnalysts',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Scope query to include only analyst users.
     *
     * @param  Builder<self>  $query
     * @return Builder<self>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
              'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
              'authenticatable' => 'Illuminate\\Foundation\\Auth\\User',
              'notifiable' => 'Illuminate\\Notifications\\Notifiable',
              'hasroles' => 'Spatie\\Permission\\Traits\\HasRoles',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Builder',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'query',
               'type' => 'Illuminate\\Database\\Eloquent\\Builder',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        12 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'scopeWithNegeri',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Scope query to include users with negeri scope.
     *
     * @param  Builder<self>  $query
     * @return Builder<self>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
              'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
              'authenticatable' => 'Illuminate\\Foundation\\Auth\\User',
              'notifiable' => 'Illuminate\\Notifications\\Notifiable',
              'hasroles' => 'Spatie\\Permission\\Traits\\HasRoles',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Builder',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'query',
               'type' => 'Illuminate\\Database\\Eloquent\\Builder',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        13 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'scopeWithCooperative',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Scope query to include users with cooperative scope.
     *
     * @param  Builder<self>  $query
     * @return Builder<self>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
              'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
              'authenticatable' => 'Illuminate\\Foundation\\Auth\\User',
              'notifiable' => 'Illuminate\\Notifications\\Notifiable',
              'hasroles' => 'Spatie\\Permission\\Traits\\HasRoles',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Builder',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'query',
               'type' => 'Illuminate\\Database\\Eloquent\\Builder',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        14 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getIsAdminAttribute',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Check if user has admin role.
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
              'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
              'authenticatable' => 'Illuminate\\Foundation\\Auth\\User',
              'notifiable' => 'Illuminate\\Notifications\\Notifiable',
              'hasroles' => 'Spatie\\Permission\\Traits\\HasRoles',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        15 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getIsAnalystAttribute',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Check if user has analyst role.
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
              'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
              'authenticatable' => 'Illuminate\\Foundation\\Auth\\User',
              'notifiable' => 'Illuminate\\Notifications\\Notifiable',
              'hasroles' => 'Spatie\\Permission\\Traits\\HasRoles',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        16 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getRoleDisplayAttribute',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get human-readable role name.
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
              'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
              'authenticatable' => 'Illuminate\\Foundation\\Auth\\User',
              'notifiable' => 'Illuminate\\Notifications\\Notifiable',
              'hasroles' => 'Spatie\\Permission\\Traits\\HasRoles',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'string',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        17 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'canAccessNegeri',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Check if user can access data from a specific negeri.
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
              'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
              'authenticatable' => 'Illuminate\\Foundation\\Auth\\User',
              'notifiable' => 'Illuminate\\Notifications\\Notifiable',
              'hasroles' => 'Spatie\\Permission\\Traits\\HasRoles',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'negeri',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        18 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'canAccessCooperative',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Check if user can access data from a specific cooperative.
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
              'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
              'authenticatable' => 'Illuminate\\Foundation\\Auth\\User',
              'notifiable' => 'Illuminate\\Notifications\\Notifiable',
              'hasroles' => 'Spatie\\Permission\\Traits\\HasRoles',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'cooperativeId',
               'type' => 'int',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        19 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'canImport',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Check if user can perform data imports.
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
              'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
              'authenticatable' => 'Illuminate\\Foundation\\Auth\\User',
              'notifiable' => 'Illuminate\\Notifications\\Notifiable',
              'hasroles' => 'Spatie\\Permission\\Traits\\HasRoles',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        20 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'canExport',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Check if user can export data.
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
              'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
              'authenticatable' => 'Illuminate\\Foundation\\Auth\\User',
              'notifiable' => 'Illuminate\\Notifications\\Notifiable',
              'hasroles' => 'Spatie\\Permission\\Traits\\HasRoles',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        21 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'canManageSettings',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Check if user can manage system settings.
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
              'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
              'authenticatable' => 'Illuminate\\Foundation\\Auth\\User',
              'notifiable' => 'Illuminate\\Notifications\\Notifiable',
              'hasroles' => 'Spatie\\Permission\\Traits\\HasRoles',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        22 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'canManageUsers',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Check if user can manage users.
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
              'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
              'authenticatable' => 'Illuminate\\Foundation\\Auth\\User',
              'notifiable' => 'Illuminate\\Notifications\\Notifiable',
              'hasroles' => 'Spatie\\Permission\\Traits\\HasRoles',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        23 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getAccessibleHomestays',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get the homestays this user can access based on their scope.
     *
     * @return Builder<\\App\\Models\\Homestay>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
              'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
              'authenticatable' => 'Illuminate\\Foundation\\Auth\\User',
              'notifiable' => 'Illuminate\\Notifications\\Notifiable',
              'hasroles' => 'Spatie\\Permission\\Traits\\HasRoles',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Builder',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        24 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getAccessibleCooperatives',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get the cooperatives this user can access based on their scope.
     *
     * @return Builder<\\App\\Models\\Cooperative>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
              'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
              'authenticatable' => 'Illuminate\\Foundation\\Auth\\User',
              'notifiable' => 'Illuminate\\Notifications\\Notifiable',
              'hasroles' => 'Spatie\\Permission\\Traits\\HasRoles',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Builder',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        25 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'setNegeriAttribute',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Set the negeri attribute to ensure consistent format.
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
              'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
              'authenticatable' => 'Illuminate\\Foundation\\Auth\\User',
              'notifiable' => 'Illuminate\\Notifications\\Notifiable',
              'hasroles' => 'Spatie\\Permission\\Traits\\HasRoles',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'void',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'value',
               'type' => '?string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        26 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'setNameAttribute',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Set the name attribute to ensure proper formatting.
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
              'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
              'authenticatable' => 'Illuminate\\Foundation\\Auth\\User',
              'notifiable' => 'Illuminate\\Notifications\\Notifiable',
              'hasroles' => 'Spatie\\Permission\\Traits\\HasRoles',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'void',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'value',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        27 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'setEmailAttribute',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Set the email attribute to ensure lowercase.
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
              'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
              'authenticatable' => 'Illuminate\\Foundation\\Auth\\User',
              'notifiable' => 'Illuminate\\Notifications\\Notifiable',
              'hasroles' => 'Spatie\\Permission\\Traits\\HasRoles',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'void',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'value',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\xampp\\htdocs\\homestay-system-131025\\app\\Providers\\AppServiceProvider.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Providers\\AppServiceProvider',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Support\\ServiceProvider',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'register',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Register any application services.
     */',
             'namespace' => 'App\\Providers',
             'uses' => 
            array (
              'serviceprovider' => 'Illuminate\\Support\\ServiceProvider',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'void',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'boot',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Bootstrap any application services.
     */',
             'namespace' => 'App\\Providers',
             'uses' => 
            array (
              'serviceprovider' => 'Illuminate\\Support\\ServiceProvider',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'void',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\xampp\\htdocs\\homestay-system-131025\\database\\factories\\AuditLogFactory.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'Database\\Factories\\AuditLogFactory',
       'phpDoc' => 
      \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
         'phpDocString' => '/**
 * @extends \\Illuminate\\Database\\Eloquent\\Factories\\Factory<\\App\\Models\\AuditLog>
 */',
         'namespace' => 'Database\\Factories',
         'uses' => 
        array (
          'auditlog' => 'App\\Models\\AuditLog',
          'user' => 'App\\Models\\User',
          'factory' => 'Illuminate\\Database\\Eloquent\\Factories\\Factory',
        ),
         'constUses' => 
        array (
        ),
      )),
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Database\\Eloquent\\Factories\\Factory',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'model',
          ),
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * The name of the factory\'s corresponding model.
     */',
             'namespace' => 'Database\\Factories',
             'uses' => 
            array (
              'auditlog' => 'App\\Models\\AuditLog',
              'user' => 'App\\Models\\User',
              'factory' => 'Illuminate\\Database\\Eloquent\\Factories\\Factory',
            ),
             'constUses' => 
            array (
            ),
          )),
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'definition',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Define the model\'s default state.
     *
     * @return array{
     *   user_id: \\Illuminate\\Database\\Eloquent\\Factories\\Factory|int,
     *   action: string,
     *   model: string,
     *   model_id: int,
     *   before: array<string,mixed>|null,
     *   after: array<string,mixed>|null,
     *   ip_address: string,
     *   user_agent: string,
     * }
     */',
             'namespace' => 'Database\\Factories',
             'uses' => 
            array (
              'auditlog' => 'App\\Models\\AuditLog',
              'user' => 'App\\Models\\User',
              'factory' => 'Illuminate\\Database\\Eloquent\\Factories\\Factory',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'created',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'static',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'updated',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'static',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'deleted',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'static',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\xampp\\htdocs\\homestay-system-131025\\database\\factories\\ClusterFactory.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'Database\\Factories\\ClusterFactory',
       'phpDoc' => 
      \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
         'phpDocString' => '/**
 * @extends \\Illuminate\\Database\\Eloquent\\Factories\\Factory<\\App\\Models\\Cluster>
 */',
         'namespace' => 'Database\\Factories',
         'uses' => 
        array (
          'cluster' => 'App\\Models\\Cluster',
          'factory' => 'Illuminate\\Database\\Eloquent\\Factories\\Factory',
        ),
         'constUses' => 
        array (
        ),
      )),
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Database\\Eloquent\\Factories\\Factory',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'model',
          ),
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * The name of the factory\'s corresponding model.
     */',
             'namespace' => 'Database\\Factories',
             'uses' => 
            array (
              'cluster' => 'App\\Models\\Cluster',
              'factory' => 'Illuminate\\Database\\Eloquent\\Factories\\Factory',
            ),
             'constUses' => 
            array (
            ),
          )),
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'definition',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Define the model\'s default state.
     *
     * @return array<string,mixed>
     */',
             'namespace' => 'Database\\Factories',
             'uses' => 
            array (
              'cluster' => 'App\\Models\\Cluster',
              'factory' => 'Illuminate\\Database\\Eloquent\\Factories\\Factory',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'ecoTourism',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Create eco-tourism cluster.
     */',
             'namespace' => 'Database\\Factories',
             'uses' => 
            array (
              'cluster' => 'App\\Models\\Cluster',
              'factory' => 'Illuminate\\Database\\Eloquent\\Factories\\Factory',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'static',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'culturalHeritage',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Create cultural heritage cluster.
     */',
             'namespace' => 'Database\\Factories',
             'uses' => 
            array (
              'cluster' => 'App\\Models\\Cluster',
              'factory' => 'Illuminate\\Database\\Eloquent\\Factories\\Factory',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'static',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'adventureTourism',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Create adventure tourism cluster.
     */',
             'namespace' => 'Database\\Factories',
             'uses' => 
            array (
              'cluster' => 'App\\Models\\Cluster',
              'factory' => 'Illuminate\\Database\\Eloquent\\Factories\\Factory',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'static',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        5 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'marineTourism',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Create marine tourism cluster.
     */',
             'namespace' => 'Database\\Factories',
             'uses' => 
            array (
              'cluster' => 'App\\Models\\Cluster',
              'factory' => 'Illuminate\\Database\\Eloquent\\Factories\\Factory',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'static',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        6 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'forNegeri',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Create cluster for specific negeri.
     */',
             'namespace' => 'Database\\Factories',
             'uses' => 
            array (
              'cluster' => 'App\\Models\\Cluster',
              'factory' => 'Illuminate\\Database\\Eloquent\\Factories\\Factory',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'static',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'negeri',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\xampp\\htdocs\\homestay-system-131025\\database\\factories\\CooperativeFactory.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'Database\\Factories\\CooperativeFactory',
       'phpDoc' => 
      \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
         'phpDocString' => '/**
 * @extends \\Illuminate\\Database\\Eloquent\\Factories\\Factory<\\App\\Models\\Cooperative>
 */',
         'namespace' => 'Database\\Factories',
         'uses' => 
        array (
          'cooperative' => 'App\\Models\\Cooperative',
          'factory' => 'Illuminate\\Database\\Eloquent\\Factories\\Factory',
        ),
         'constUses' => 
        array (
        ),
      )),
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Database\\Eloquent\\Factories\\Factory',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'model',
          ),
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * The name of the factory\'s corresponding model.
     */',
             'namespace' => 'Database\\Factories',
             'uses' => 
            array (
              'cooperative' => 'App\\Models\\Cooperative',
              'factory' => 'Illuminate\\Database\\Eloquent\\Factories\\Factory',
            ),
             'constUses' => 
            array (
            ),
          )),
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'definition',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Define the model\'s default state.
     *
     * @return array<string,mixed>
     */',
             'namespace' => 'Database\\Factories',
             'uses' => 
            array (
              'cooperative' => 'App\\Models\\Cooperative',
              'factory' => 'Illuminate\\Database\\Eloquent\\Factories\\Factory',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'forNegeri',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Create cooperative for specific negeri.
     */',
             'namespace' => 'Database\\Factories',
             'uses' => 
            array (
              'cooperative' => 'App\\Models\\Cooperative',
              'factory' => 'Illuminate\\Database\\Eloquent\\Factories\\Factory',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'static',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'negeri',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'ecoTourism',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Create eco-tourism focused cooperative.
     */',
             'namespace' => 'Database\\Factories',
             'uses' => 
            array (
              'cooperative' => 'App\\Models\\Cooperative',
              'factory' => 'Illuminate\\Database\\Eloquent\\Factories\\Factory',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'static',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'culturalHeritage',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Create cultural heritage focused cooperative.
     */',
             'namespace' => 'Database\\Factories',
             'uses' => 
            array (
              'cooperative' => 'App\\Models\\Cooperative',
              'factory' => 'Illuminate\\Database\\Eloquent\\Factories\\Factory',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'static',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\xampp\\htdocs\\homestay-system-131025\\database\\factories\\HomestayFactory.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'Database\\Factories\\HomestayFactory',
       'phpDoc' => 
      \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
         'phpDocString' => '/**
 * @extends \\Illuminate\\Database\\Eloquent\\Factories\\Factory<\\App\\Models\\Homestay>
 */',
         'namespace' => 'Database\\Factories',
         'uses' => 
        array (
          'cluster' => 'App\\Models\\Cluster',
          'cooperative' => 'App\\Models\\Cooperative',
          'homestay' => 'App\\Models\\Homestay',
          'factory' => 'Illuminate\\Database\\Eloquent\\Factories\\Factory',
        ),
         'constUses' => 
        array (
        ),
      )),
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Database\\Eloquent\\Factories\\Factory',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'model',
          ),
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * The name of the factory\'s corresponding model.
     */',
             'namespace' => 'Database\\Factories',
             'uses' => 
            array (
              'cluster' => 'App\\Models\\Cluster',
              'cooperative' => 'App\\Models\\Cooperative',
              'homestay' => 'App\\Models\\Homestay',
              'factory' => 'Illuminate\\Database\\Eloquent\\Factories\\Factory',
            ),
             'constUses' => 
            array (
            ),
          )),
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'definition',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Define the model\'s default state.
     *
     * @return array<string,mixed>
     */',
             'namespace' => 'Database\\Factories',
             'uses' => 
            array (
              'cluster' => 'App\\Models\\Cluster',
              'cooperative' => 'App\\Models\\Cooperative',
              'homestay' => 'App\\Models\\Homestay',
              'factory' => 'Illuminate\\Database\\Eloquent\\Factories\\Factory',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'koperasi',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Indicate that the homestay is managed by a cooperative.
     */',
             'namespace' => 'Database\\Factories',
             'uses' => 
            array (
              'cluster' => 'App\\Models\\Cluster',
              'cooperative' => 'App\\Models\\Cooperative',
              'homestay' => 'App\\Models\\Homestay',
              'factory' => 'Illuminate\\Database\\Eloquent\\Factories\\Factory',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'static',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'individu',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Indicate that the homestay is individually managed.
     */',
             'namespace' => 'Database\\Factories',
             'uses' => 
            array (
              'cluster' => 'App\\Models\\Cluster',
              'cooperative' => 'App\\Models\\Cooperative',
              'homestay' => 'App\\Models\\Homestay',
              'factory' => 'Illuminate\\Database\\Eloquent\\Factories\\Factory',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'static',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'active',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Indicate that the homestay is active.
     */',
             'namespace' => 'Database\\Factories',
             'uses' => 
            array (
              'cluster' => 'App\\Models\\Cluster',
              'cooperative' => 'App\\Models\\Cooperative',
              'homestay' => 'App\\Models\\Homestay',
              'factory' => 'Illuminate\\Database\\Eloquent\\Factories\\Factory',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'static',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        5 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'inactive',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Indicate that the homestay is inactive.
     */',
             'namespace' => 'Database\\Factories',
             'uses' => 
            array (
              'cluster' => 'App\\Models\\Cluster',
              'cooperative' => 'App\\Models\\Cooperative',
              'homestay' => 'App\\Models\\Homestay',
              'factory' => 'Illuminate\\Database\\Eloquent\\Factories\\Factory',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'static',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        6 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'withCluster',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Indicate that the homestay belongs to a cluster.
     */',
             'namespace' => 'Database\\Factories',
             'uses' => 
            array (
              'cluster' => 'App\\Models\\Cluster',
              'cooperative' => 'App\\Models\\Cooperative',
              'homestay' => 'App\\Models\\Homestay',
              'factory' => 'Illuminate\\Database\\Eloquent\\Factories\\Factory',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'static',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        7 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'forNegeri',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Create homestay for specific negeri.
     */',
             'namespace' => 'Database\\Factories',
             'uses' => 
            array (
              'cluster' => 'App\\Models\\Cluster',
              'cooperative' => 'App\\Models\\Cooperative',
              'homestay' => 'App\\Models\\Homestay',
              'factory' => 'Illuminate\\Database\\Eloquent\\Factories\\Factory',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'static',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'negeri',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        8 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'ecoTourism',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Create eco-tourism themed homestay.
     */',
             'namespace' => 'Database\\Factories',
             'uses' => 
            array (
              'cluster' => 'App\\Models\\Cluster',
              'cooperative' => 'App\\Models\\Cooperative',
              'homestay' => 'App\\Models\\Homestay',
              'factory' => 'Illuminate\\Database\\Eloquent\\Factories\\Factory',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'static',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        9 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'culturalHeritage',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Create cultural heritage themed homestay.
     */',
             'namespace' => 'Database\\Factories',
             'uses' => 
            array (
              'cluster' => 'App\\Models\\Cluster',
              'cooperative' => 'App\\Models\\Cooperative',
              'homestay' => 'App\\Models\\Homestay',
              'factory' => 'Illuminate\\Database\\Eloquent\\Factories\\Factory',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'static',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        10 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'configure',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Configure model after making.
     */',
             'namespace' => 'Database\\Factories',
             'uses' => 
            array (
              'cluster' => 'App\\Models\\Cluster',
              'cooperative' => 'App\\Models\\Cooperative',
              'homestay' => 'App\\Models\\Homestay',
              'factory' => 'Illuminate\\Database\\Eloquent\\Factories\\Factory',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'static',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\xampp\\htdocs\\homestay-system-131025\\database\\factories\\ImportFactory.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'Database\\Factories\\ImportFactory',
       'phpDoc' => 
      \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
         'phpDocString' => '/**
 * @extends \\Illuminate\\Database\\Eloquent\\Factories\\Factory<\\App\\Models\\Import>
 */',
         'namespace' => 'Database\\Factories',
         'uses' => 
        array (
          'import' => 'App\\Models\\Import',
          'user' => 'App\\Models\\User',
          'factory' => 'Illuminate\\Database\\Eloquent\\Factories\\Factory',
        ),
         'constUses' => 
        array (
        ),
      )),
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Database\\Eloquent\\Factories\\Factory',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'model',
          ),
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * The name of the factory\'s corresponding model.
     */',
             'namespace' => 'Database\\Factories',
             'uses' => 
            array (
              'import' => 'App\\Models\\Import',
              'user' => 'App\\Models\\User',
              'factory' => 'Illuminate\\Database\\Eloquent\\Factories\\Factory',
            ),
             'constUses' => 
            array (
            ),
          )),
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'definition',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Define the model\'s default state.
     *
     * @return array{
     *   user_id: \\Illuminate\\Database\\Eloquent\\Factories\\Factory|int,
     *   type: string,
     *   filename: string,
     *   status: string,
     *   rows_total: int,
     *   rows_processed: int,
     *   rows_success: int,
     *   rows_failed: int,
     *   meta: array<string,mixed>,
     * }
     */',
             'namespace' => 'Database\\Factories',
             'uses' => 
            array (
              'import' => 'App\\Models\\Import',
              'user' => 'App\\Models\\User',
              'factory' => 'Illuminate\\Database\\Eloquent\\Factories\\Factory',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'completed',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'static',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'failed',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'static',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'processing',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'static',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\xampp\\htdocs\\homestay-system-131025\\database\\factories\\LaporanTerjadualFactory.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'Database\\Factories\\LaporanTerjadualFactory',
       'phpDoc' => 
      \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
         'phpDocString' => '/**
 * @extends \\Illuminate\\Database\\Eloquent\\Factories\\Factory<\\App\\Models\\LaporanTerjadual>
 */',
         'namespace' => 'Database\\Factories',
         'uses' => 
        array (
          'laporanterjadual' => 'App\\Models\\LaporanTerjadual',
          'user' => 'App\\Models\\User',
          'factory' => 'Illuminate\\Database\\Eloquent\\Factories\\Factory',
        ),
         'constUses' => 
        array (
        ),
      )),
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Database\\Eloquent\\Factories\\Factory',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'model',
          ),
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * The name of the factory\'s corresponding model.
     */',
             'namespace' => 'Database\\Factories',
             'uses' => 
            array (
              'laporanterjadual' => 'App\\Models\\LaporanTerjadual',
              'user' => 'App\\Models\\User',
              'factory' => 'Illuminate\\Database\\Eloquent\\Factories\\Factory',
            ),
             'constUses' => 
            array (
            ),
          )),
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'definition',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Define the model\'s default state.
     *
     * @return array<string,mixed>
     */',
             'namespace' => 'Database\\Factories',
             'uses' => 
            array (
              'laporanterjadual' => 'App\\Models\\LaporanTerjadual',
              'user' => 'App\\Models\\User',
              'factory' => 'Illuminate\\Database\\Eloquent\\Factories\\Factory',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'active',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'static',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'inactive',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'static',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'monthly',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'static',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        5 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'weekly',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'static',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        6 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'daily',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'static',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\xampp\\htdocs\\homestay-system-131025\\database\\factories\\PerformanceFactory.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'Database\\Factories\\PerformanceFactory',
       'phpDoc' => 
      \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
         'phpDocString' => '/**
 * @extends \\Illuminate\\Database\\Eloquent\\Factories\\Factory<\\App\\Models\\Performance>
 */',
         'namespace' => 'Database\\Factories',
         'uses' => 
        array (
          'homestay' => 'App\\Models\\Homestay',
          'performance' => 'App\\Models\\Performance',
          'factory' => 'Illuminate\\Database\\Eloquent\\Factories\\Factory',
        ),
         'constUses' => 
        array (
        ),
      )),
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Database\\Eloquent\\Factories\\Factory',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'model',
          ),
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * The name of the factory\'s corresponding model.
     */',
             'namespace' => 'Database\\Factories',
             'uses' => 
            array (
              'homestay' => 'App\\Models\\Homestay',
              'performance' => 'App\\Models\\Performance',
              'factory' => 'Illuminate\\Database\\Eloquent\\Factories\\Factory',
            ),
             'constUses' => 
            array (
            ),
          )),
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'definition',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Define the model\'s default state.
     *
     * @return array<string,mixed>
     */',
             'namespace' => 'Database\\Factories',
             'uses' => 
            array (
              'homestay' => 'App\\Models\\Homestay',
              'performance' => 'App\\Models\\Performance',
              'factory' => 'Illuminate\\Database\\Eloquent\\Factories\\Factory',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'forYear',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Create performance for specific year.
     */',
             'namespace' => 'Database\\Factories',
             'uses' => 
            array (
              'homestay' => 'App\\Models\\Homestay',
              'performance' => 'App\\Models\\Performance',
              'factory' => 'Illuminate\\Database\\Eloquent\\Factories\\Factory',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'static',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'year',
               'type' => 'int',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'forPeriod',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Create performance for specific month and year.
     */',
             'namespace' => 'Database\\Factories',
             'uses' => 
            array (
              'homestay' => 'App\\Models\\Homestay',
              'performance' => 'App\\Models\\Performance',
              'factory' => 'Illuminate\\Database\\Eloquent\\Factories\\Factory',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'static',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'year',
               'type' => 'int',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'month',
               'type' => 'int',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'forHomestay',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Create performance for specific homestay.
     */',
             'namespace' => 'Database\\Factories',
             'uses' => 
            array (
              'homestay' => 'App\\Models\\Homestay',
              'performance' => 'App\\Models\\Performance',
              'factory' => 'Illuminate\\Database\\Eloquent\\Factories\\Factory',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'static',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'homestayId',
               'type' => 'int',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        5 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'highPerformance',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Create high performance record.
     */',
             'namespace' => 'Database\\Factories',
             'uses' => 
            array (
              'homestay' => 'App\\Models\\Homestay',
              'performance' => 'App\\Models\\Performance',
              'factory' => 'Illuminate\\Database\\Eloquent\\Factories\\Factory',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'static',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        6 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'lowPerformance',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Create low performance record.
     */',
             'namespace' => 'Database\\Factories',
             'uses' => 
            array (
              'homestay' => 'App\\Models\\Homestay',
              'performance' => 'App\\Models\\Performance',
              'factory' => 'Illuminate\\Database\\Eloquent\\Factories\\Factory',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'static',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        7 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'noActivity',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Create no visitors/income record.
     */',
             'namespace' => 'Database\\Factories',
             'uses' => 
            array (
              'homestay' => 'App\\Models\\Homestay',
              'performance' => 'App\\Models\\Performance',
              'factory' => 'Illuminate\\Database\\Eloquent\\Factories\\Factory',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'static',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        8 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'peakSeason',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Create seasonal peak performance (high season).
     */',
             'namespace' => 'Database\\Factories',
             'uses' => 
            array (
              'homestay' => 'App\\Models\\Homestay',
              'performance' => 'App\\Models\\Performance',
              'factory' => 'Illuminate\\Database\\Eloquent\\Factories\\Factory',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'static',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        9 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'offSeason',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Create off-season performance (low season).
     */',
             'namespace' => 'Database\\Factories',
             'uses' => 
            array (
              'homestay' => 'App\\Models\\Homestay',
              'performance' => 'App\\Models\\Performance',
              'factory' => 'Illuminate\\Database\\Eloquent\\Factories\\Factory',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'static',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        10 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'foreignVisitorFocused',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Create foreign visitor focused performance.
     */',
             'namespace' => 'Database\\Factories',
             'uses' => 
            array (
              'homestay' => 'App\\Models\\Homestay',
              'performance' => 'App\\Models\\Performance',
              'factory' => 'Illuminate\\Database\\Eloquent\\Factories\\Factory',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'static',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        11 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'domesticVisitorFocused',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Create domestic visitor focused performance.
     */',
             'namespace' => 'Database\\Factories',
             'uses' => 
            array (
              'homestay' => 'App\\Models\\Homestay',
              'performance' => 'App\\Models\\Performance',
              'factory' => 'Illuminate\\Database\\Eloquent\\Factories\\Factory',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'static',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        12 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'monthlySeries',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Create monthly series for a homestay (12 months).
     *
     * @return list<array<string,mixed>>
     */',
             'namespace' => 'Database\\Factories',
             'uses' => 
            array (
              'homestay' => 'App\\Models\\Homestay',
              'performance' => 'App\\Models\\Performance',
              'factory' => 'Illuminate\\Database\\Eloquent\\Factories\\Factory',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'homestayId',
               'type' => 'int',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'year',
               'type' => 'int',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\xampp\\htdocs\\homestay-system-131025\\database\\factories\\SystemSettingFactory.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'Database\\Factories\\SystemSettingFactory',
       'phpDoc' => 
      \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
         'phpDocString' => '/**
 * @extends \\Illuminate\\Database\\Eloquent\\Factories\\Factory<\\App\\Models\\SystemSetting>
 */',
         'namespace' => 'Database\\Factories',
         'uses' => 
        array (
          'systemsetting' => 'App\\Models\\SystemSetting',
          'factory' => 'Illuminate\\Database\\Eloquent\\Factories\\Factory',
        ),
         'constUses' => 
        array (
        ),
      )),
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Database\\Eloquent\\Factories\\Factory',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'model',
          ),
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * The name of the factory\'s corresponding model.
     */',
             'namespace' => 'Database\\Factories',
             'uses' => 
            array (
              'systemsetting' => 'App\\Models\\SystemSetting',
              'factory' => 'Illuminate\\Database\\Eloquent\\Factories\\Factory',
            ),
             'constUses' => 
            array (
            ),
          )),
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'definition',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Define the model\'s default state.
     *
     * @return array<string,mixed>
     */',
             'namespace' => 'Database\\Factories',
             'uses' => 
            array (
              'systemsetting' => 'App\\Models\\SystemSetting',
              'factory' => 'Illuminate\\Database\\Eloquent\\Factories\\Factory',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'global',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'static',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'forNegeri',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'static',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'negeri',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'forKoperasi',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'static',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'koperasiId',
               'type' => 'int',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        5 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'appConfiguration',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'static',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        6 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'dashboardSettings',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'static',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\xampp\\htdocs\\homestay-system-131025\\database\\factories\\UserFactory.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'Database\\Factories\\UserFactory',
       'phpDoc' => 
      \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
         'phpDocString' => '/**
 * @extends \\Illuminate\\Database\\Eloquent\\Factories\\Factory<\\App\\Models\\User>
 */',
         'namespace' => 'Database\\Factories',
         'uses' => 
        array (
          'cooperative' => 'App\\Models\\Cooperative',
          'factory' => 'Illuminate\\Database\\Eloquent\\Factories\\Factory',
          'hash' => 'Illuminate\\Support\\Facades\\Hash',
          'str' => 'Illuminate\\Support\\Str',
        ),
         'constUses' => 
        array (
        ),
      )),
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Database\\Eloquent\\Factories\\Factory',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'password',
          ),
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * The current password being used by the factory.
     */',
             'namespace' => 'Database\\Factories',
             'uses' => 
            array (
              'cooperative' => 'App\\Models\\Cooperative',
              'factory' => 'Illuminate\\Database\\Eloquent\\Factories\\Factory',
              'hash' => 'Illuminate\\Support\\Facades\\Hash',
              'str' => 'Illuminate\\Support\\Str',
            ),
             'constUses' => 
            array (
            ),
          )),
           'type' => '?string',
           'public' => false,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'definition',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @return array{
     *   name: string,
     *   email: string,
     *   email_verified_at: \\Carbon\\Carbon|null,
     *   password: string,
     *   remember_token: string|null,
     *   negeri: string|null,
     *   cooperative_id: int|null,
     * }
     */',
             'namespace' => 'Database\\Factories',
             'uses' => 
            array (
              'cooperative' => 'App\\Models\\Cooperative',
              'factory' => 'Illuminate\\Database\\Eloquent\\Factories\\Factory',
              'hash' => 'Illuminate\\Support\\Facades\\Hash',
              'str' => 'Illuminate\\Support\\Str',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'unverified',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Indicate that the model\'s email address should be unverified.
     */',
             'namespace' => 'Database\\Factories',
             'uses' => 
            array (
              'cooperative' => 'App\\Models\\Cooperative',
              'factory' => 'Illuminate\\Database\\Eloquent\\Factories\\Factory',
              'hash' => 'Illuminate\\Support\\Facades\\Hash',
              'str' => 'Illuminate\\Support\\Str',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'static',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'admin',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Create a user with admin role scope.
     */',
             'namespace' => 'Database\\Factories',
             'uses' => 
            array (
              'cooperative' => 'App\\Models\\Cooperative',
              'factory' => 'Illuminate\\Database\\Eloquent\\Factories\\Factory',
              'hash' => 'Illuminate\\Support\\Facades\\Hash',
              'str' => 'Illuminate\\Support\\Str',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'static',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'analyst',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Create a user with analyst role.
     */',
             'namespace' => 'Database\\Factories',
             'uses' => 
            array (
              'cooperative' => 'App\\Models\\Cooperative',
              'factory' => 'Illuminate\\Database\\Eloquent\\Factories\\Factory',
              'hash' => 'Illuminate\\Support\\Facades\\Hash',
              'str' => 'Illuminate\\Support\\Str',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'static',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        5 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'viewer',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Create a user with viewer role.
     */',
             'namespace' => 'Database\\Factories',
             'uses' => 
            array (
              'cooperative' => 'App\\Models\\Cooperative',
              'factory' => 'Illuminate\\Database\\Eloquent\\Factories\\Factory',
              'hash' => 'Illuminate\\Support\\Facades\\Hash',
              'str' => 'Illuminate\\Support\\Str',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'static',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        6 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'forNegeri',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Create a user scoped to specific negeri.
     */',
             'namespace' => 'Database\\Factories',
             'uses' => 
            array (
              'cooperative' => 'App\\Models\\Cooperative',
              'factory' => 'Illuminate\\Database\\Eloquent\\Factories\\Factory',
              'hash' => 'Illuminate\\Support\\Facades\\Hash',
              'str' => 'Illuminate\\Support\\Str',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'static',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'negeri',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        7 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'forCooperative',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Create a user scoped to specific cooperative.
     */',
             'namespace' => 'Database\\Factories',
             'uses' => 
            array (
              'cooperative' => 'App\\Models\\Cooperative',
              'factory' => 'Illuminate\\Database\\Eloquent\\Factories\\Factory',
              'hash' => 'Illuminate\\Support\\Facades\\Hash',
              'str' => 'Illuminate\\Support\\Str',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'static',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'cooperativeId',
               'type' => 'int',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        8 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'superAdmin',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Create a super admin user.
     */',
             'namespace' => 'Database\\Factories',
             'uses' => 
            array (
              'cooperative' => 'App\\Models\\Cooperative',
              'factory' => 'Illuminate\\Database\\Eloquent\\Factories\\Factory',
              'hash' => 'Illuminate\\Support\\Facades\\Hash',
              'str' => 'Illuminate\\Support\\Str',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'static',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\xampp\\htdocs\\homestay-system-131025\\database\\seeders\\ClusterSeeder.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'Database\\Seeders\\ClusterSeeder',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Database\\Seeder',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'run',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Run the database seeds.
     */',
             'namespace' => 'Database\\Seeders',
             'uses' => 
            array (
              'cluster' => 'App\\Models\\Cluster',
              'seeder' => 'Illuminate\\Database\\Seeder',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'void',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\xampp\\htdocs\\homestay-system-131025\\database\\seeders\\CooperativeSeeder.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'Database\\Seeders\\CooperativeSeeder',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Database\\Seeder',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'run',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Run the database seeds.
     */',
             'namespace' => 'Database\\Seeders',
             'uses' => 
            array (
              'cooperative' => 'App\\Models\\Cooperative',
              'seeder' => 'Illuminate\\Database\\Seeder',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'void',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\xampp\\htdocs\\homestay-system-131025\\database\\seeders\\DatabaseSeeder.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'Database\\Seeders\\DatabaseSeeder',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Database\\Seeder',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'run',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Seed the application\'s database.
     */',
             'namespace' => 'Database\\Seeders',
             'uses' => 
            array (
              'user' => 'App\\Models\\User',
              'seeder' => 'Illuminate\\Database\\Seeder',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'void',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\xampp\\htdocs\\homestay-system-131025\\database\\seeders\\HomestaySeeder.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'Database\\Seeders\\HomestaySeeder',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Database\\Seeder',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'run',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Run the database seeds.
     */',
             'namespace' => 'Database\\Seeders',
             'uses' => 
            array (
              'cluster' => 'App\\Models\\Cluster',
              'cooperative' => 'App\\Models\\Cooperative',
              'homestay' => 'App\\Models\\Homestay',
              'seeder' => 'Illuminate\\Database\\Seeder',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'void',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\xampp\\htdocs\\homestay-system-131025\\database\\seeders\\PerformanceSeeder.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'Database\\Seeders\\PerformanceSeeder',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Database\\Seeder',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'run',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Run the database seeds.
     */',
             'namespace' => 'Database\\Seeders',
             'uses' => 
            array (
              'homestay' => 'App\\Models\\Homestay',
              'performance' => 'App\\Models\\Performance',
              'carbon' => 'Carbon\\Carbon',
              'seeder' => 'Illuminate\\Database\\Seeder',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'void',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\xampp\\htdocs\\homestay-system-131025\\database\\seeders\\ReferenceDataSeeder.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'Database\\Seeders\\ReferenceDataSeeder',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Database\\Seeder',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'run',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'void',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\xampp\\htdocs\\homestay-system-131025\\database\\seeders\\RolesAndPermissionsSeeder.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'Database\\Seeders\\RolesAndPermissionsSeeder',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Database\\Seeder',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'run',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'void',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\xampp\\htdocs\\homestay-system-131025\\database\\seeders\\SampleDataSeeder.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'Database\\Seeders\\SampleDataSeeder',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Database\\Seeder',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'run',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Run the database seeds.
     */',
             'namespace' => 'Database\\Seeders',
             'uses' => 
            array (
              'auditlog' => 'App\\Models\\AuditLog',
              'homestay' => 'App\\Models\\Homestay',
              'import' => 'App\\Models\\Import',
              'laporanterjadual' => 'App\\Models\\LaporanTerjadual',
              'user' => 'App\\Models\\User',
              'seeder' => 'Illuminate\\Database\\Seeder',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'void',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\xampp\\htdocs\\homestay-system-131025\\database\\seeders\\SystemSettingSeeder.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'Database\\Seeders\\SystemSettingSeeder',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Database\\Seeder',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'run',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Run the database seeds.
     */',
             'namespace' => 'Database\\Seeders',
             'uses' => 
            array (
              'systemsetting' => 'App\\Models\\SystemSetting',
              'seeder' => 'Illuminate\\Database\\Seeder',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'void',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\xampp\\htdocs\\homestay-system-131025\\database\\seeders\\UserSeeder.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'Database\\Seeders\\UserSeeder',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Database\\Seeder',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'run',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Run the database seeds.
     */',
             'namespace' => 'Database\\Seeders',
             'uses' => 
            array (
              'cooperative' => 'App\\Models\\Cooperative',
              'user' => 'App\\Models\\User',
              'seeder' => 'Illuminate\\Database\\Seeder',
              'hash' => 'Illuminate\\Support\\Facades\\Hash',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'void',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
); },
];
