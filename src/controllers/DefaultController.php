<?php

namespace luya\styleguide\controllers;

use Yii;

/**
 * Display the Styleguide Elements.
 *
 * @author Basil Suter <basil@nadar.io>
 * @since 1.0.0
 */
class DefaultController extends \luya\web\Controller
{
    const STYLEGUIDE_SESSION_PWNAME = '__styleguide_pass';
    
    public $layout = 'main.php';

    /**
     * Render Styleguide.
     *
     * @return \yii\web\Response|string
     */
    public function actionIndex()
    {
        if (!$this->hasAccess()) {
            return $this->redirect(['login']);
        }
        
        foreach ($this->module->assetFiles as $class) {
            $this->registerAsset($class);
        }

        return $this->render('index', [
            'title' => 'Styleguide',
            'showDomain' => true,
            'styleguide' => $this->extractElementsFromComponent()
        ]);
    }

    /**
     * Login action if password is required.
     *
     * @return \yii\web\Response|string
     */
    public function actionLogin()
    {
        $password = Yii::$app->request->post('pass', false);

        // check password
        if ($password === $this->module->password || $this->hasAccess()) {
            Yii::$app->session->set(self::STYLEGUIDE_SESSION_PWNAME, $password);
            return $this->redirect(['index']);
        } elseif ($password !== false) {
            Yii::$app->session->setFlash('wrong.styleguide.password');
        }

        return $this->render('login');
    }
    
    /**
     * Extract the data from the element component
     *
     * @return array
     */
    protected function extractElementsFromComponent()
    {
        $elements = [];
        foreach (Yii::$app->element->getElements() as $name => $closure) {
            $reflection = new \ReflectionFunction($closure);
            $args = $reflection->getParameters();
            $params = [];
            $writtenParams = [];
            foreach ($args as $k => $v) {
                $mock = Yii::$app->element->getMockedArgValue($name, $v->name);
                if ($mock !== false) {
                    $params[] = $mock;
                    if (is_array($mock)) {
                        $writtenParams[] = 'array $'.$v->name;
                    } else {
                        $writtenParams[] = '$'.$v->name;
                    }
                } else {
                    if ($v->isArray()) {
                        $params[] = ['$'.$v->name];
                        $writtenParams[] = 'array $'.$v->name;
                    } else {
                        $params[] = '$'.$v->name;
                        $writtenParams[] = '$'.$v->name;
                    }
                }
            }
            
            $elements[] = $this->defineElement($name, $name, null, $params, [], $writtenParams);
        }
        
        return [
            'groups' => [
                [
                    'name' => 'Elements',
                    'description' => 'Basic element overview',
                    'elements' => $elements,
                ]
            ]
        ];
    }

    /**
     * Generate the array for a given element.
     *
     * @return array
     */
    protected function defineElement($element, $name = null, $description = null, array $values = [], array $options = [], array $params = [])
    {
        return [
            'name' => $name ?: $element,
            'description' => $description,
            'element' => $element,
            'values' => $values,
            'params' => $params,
        ];
    }

    /**
     * Whether current session contains password or not.
     *
     * @return boolean
     */
    protected function hasAccess()
    {
        return $this->module->password == Yii::$app->session->get(self::STYLEGUIDE_SESSION_PWNAME, false);
    }
}
