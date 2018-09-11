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
    
    /*
    public function getStyleguideArray()
    {
        return [
            'groups' => [
                [
                    'name' => 'Headings',
                    'description' => 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.',
                    'elements' => [
                        [
                            'name' => 'Heading 1',
                            'description' => 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.',
                            'element' => 'heading1',
                            'values' => ['Heading 1'],
                            'options' => []
                        ],
                        [
                            'name' => 'Heading 1',
                            'description' => 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.',
                            'element' => 'heading1',
                            'values' => ['Heading 1'],
                            'options' => []
                        ],
                        [
                            'name' => 'Heading 2',
                            'element' => 'heading2',
                            'values' => ['Heading 2'],
                            'options' => []
                        ],
                        [
                            'name' => 'Heading 3',
                            'element' => 'heading3',
                            'values' => ['Heading 3'],
                            'options' => []
                        ],
                        [
                            'name' => 'Heading 4',
                            'element' => 'heading4',
                            'values' => ['Heading 4'],
                            'options' => []
                        ]
                    ]
                ],
                [
                    'name' => 'Texts',
                    'description' => 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.',
                    'elements' => [
                        [
                            'name' => 'Paragraph',
                            'element' => 'paragraph',
                            'values' => ['Lorem ipsum dolor sit amet...'],
                            'options' => []
                        ],
                        [
                            'name' => 'Unordered List',
                            'element' => 'ul',
                            'values' => [['Item 1', 'Item 2', 'Item 3']],
                            'options' => []
                        ],
                        [
                            'name' => 'Ordered List',
                            'element' => 'ol',
                            'values' => [['Item 1', 'Item 2', 'Item 3']],
                            'options' => []
                        ]
                    ]
                ]
            ]
        ];
    }
    */

    /**
     * Login action if password is required.
     * 
     * @return \yii\web\Response|string
     */
    public function actionLogin()
    {
        $password = Yii::$app->request->post('pass', false);
        if ($password === $this->module->password || $this->hasAccess()) {
            Yii::$app->session->set(self::STYLEGUIDE_SESSION_PWNAME, $password);
            return $this->redirect(['index']);
        } elseif ($password !== false) {
            Yii::$app->session->setFlash('wrong.styleguide.password');
        }

        return $this->render('login');
    }

    /**
     * Whether current session contains password or not.
     * 
     * @return boolean
     */
    private function hasAccess()
    {
        return $this->module->password == Yii::$app->session->get(self::STYLEGUIDE_SESSION_PWNAME, false);
    }
}
