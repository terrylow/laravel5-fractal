<?php


use League\Fractal\TransformerAbstract;

class UserTransformerWithDefaultIncludesStub extends TransformerAbstract
{
    /**
     * List of resources possible to include
     *
     * @var array
     */
    protected $availableIncludes = [];

    /**
     * List of resources to automatically include
     *
     * @var array
     */
    protected $defaultIncludes = ['orders'];

    /**
     * Transform object into a generic array
     *
     * @var $resource
     * @return array
     */
    public function transform($resource)
    {
        return [

            'id'   => $resource['id'],
            'name' => $resource['name'],

        ];
    }

    public function includeOrders()
    {
        $orders = [
            [
                'item' => 'item 1',
                'qty'  => 100,
            ],
            [
                'item' => 'item 2',
                'qty'  => 200,
            ],
        ];

        return $this->collection($orders, new OrderTransformerStub());
    }
}