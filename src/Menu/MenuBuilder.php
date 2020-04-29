<?php // generated by @SurvosLanding/MenuBuilder.php.twig

namespace App\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;

class MenuBuilder
{

    private $factory;
    /**
     * @var AuthorizationCheckerInterface
     */
    private $authorizationChecker;
    /**
     * @var TokenStorageInterface
     */
    private $tokenStorage;

    /**
     * @param FactoryInterface $factory
     *
     * Add any other dependency you need
     */
    public function __construct(FactoryInterface $factory, AuthorizationCheckerInterface $authorizationChecker, TokenStorageInterface $tokenStorage)
    {
        $this->factory = $factory;
        $this->authorizationChecker = $authorizationChecker;
        $this->tokenStorage = $tokenStorage;
    }

    // for the landing pages, we have a top navigation bar and the blocks in the body
    public function createLandingMenu(array $options) {
        $menu = $this->factory->createItem('root')
            ->setExtra('translation_domain', true)
        ;
        $menu->addChild('public_surveys',
            ['route' => 'app'])->setAttribute('icon', 'fas fa-home');
        $menu->addChild('survey_dashboard',
            [
                // 'label' => 'survey_index',
                'route' => 'app'])->setAttribute('icon', 'fas fa-home');
// $menu->addChild('survey_new', ['route' => 'survey_new'])->setAttribute('icon', 'fas fa-home');

        return $this->cleanupMenu($menu);

    }

    public function createAdminMenu(array $options)
    {
        $menu = $this->factory->createItem('root')
            ->setExtra('translation_domain', true)
        ;

        $childOptions = [
            'attributes' => ['class' => 'treeview'],
            'childrenAttributes' => ['class' => 'treeview-item'],
            'labelAttributes' => []
        ];

        $publicMenu = $menu->addChild('public', [
            'childOptions' => $childOptions,
        ]);
        $publicMenu->addChild('public_surveys',
            [
                'childOptions' => $childOptions,
                'route' => 'app'])
            ->setAttribute('icon', 'fas fa-home');

        $publicMenu->addChild('survos_landing', [
            'childOptions' => $childOptions,
            'route' => 'app'])
            ->setAttribute('icon', 'fas fa-home');

        $surveyMenu = $menu->addChild('survey.menu', [
            'childOptions' => $childOptions,
        ]);
        $surveyMenu->addChild('survey.new', ['route' => 'survey_new']);
        $surveyMenu->addChild('survey.list', ['route' => 'survey_index']);
        $menu->addChild('survey_dashboard',
            [
                // 'label' => 'survey_index',
                'route' => 'survey_dashboard'])->setAttribute('icon', 'fas fa-home');
// $menu->addChild('survey_new', ['route' => 'survey_new'])->setAttribute('icon', 'fas fa-home');



        try {
        } catch (\Exception $e) {
            // probably not loaded.
        }

        if ($this->isGranted('ROLE_ADMIN')) {
            $menu->addChild('survos_landing_credits', ['route' => 'survos_landing_credits'])->setAttribute('icon', 'fas fa-trophy');
            $menu->addChild('app_typography', ['route' => 'app_typography'])->setAttribute('icon', 'fab fa-bootstrap');
            $menu->addChild('api_entrypoint', ['route' => 'api_entrypoint'])->setAttribute('icon', 'fas fa-home');
            $menu->addChild('app_build_form', ['route' => 'app_build_form'])->setAttribute('icon', 'fas fa-home');
        }


// $menu->addChild('admin', ['route' => 'easyadmin']);

// ... add more children
        return $menu;
        return $this->cleanupMenu($menu);
    }



}