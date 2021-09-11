<?php
declare(strict_types=1);

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Event\EventInterface;
use Cake\Http\Exception\BadRequestException;

/**
 * Math component
 */
class MathComponent extends Component
{
    /**
     * {@inheritDoc}
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);
    }

    /**
     * Do complex operation
     *
     * @param int $amount1
     * @param int $amount2
     * @return int total amount
     * @link https://book.cakephp.org/3/ja/controllers/components.html
     */
    public function doComplexOperation(int $amount1, int $amount2): int
    {
        return $amount1 + $amount2;
    }

    /**
     * Before filter handler.
     *
     * @param EventInterface $event The event.
     * @return void
     */
    public function beforeFilter(EventInterface $event): void
    {
        $controller = $this->_registry->getController();
        $params = $controller->getRequest()->getQueryParams();
        if (!isset($params['amount1']) || !isset($params['amount2'])) {
            throw new BadRequestException();
        }
    }
}
