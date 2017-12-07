<?php
namespace ZF3LayoutManager;

  return [
      'service_manager' => [
          'invokables' => [
              Listener\Layout::class => Listener\Layout::class,
          ],
      ],
      'listeners'       => [
          Listener\Layout::class,
      ],
  ];
