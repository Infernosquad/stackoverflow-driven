<?php

namespace AppBundle\Serializer\Normalizer;

use FOS\RestBundle\Serializer\Normalizer\AbstractExceptionNormalizer;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class ExceptionNormalizer extends AbstractExceptionNormalizer implements NormalizerInterface
{
    /**
     * {@inheritdoc}
     */
    public function normalize($object, $format = null, array $context = [])
    {
        $data = [];

        if (isset($context['template_data']['status_code'])) {
            $data['code'] = $statusCode = $context['template_data']['status_code'];
        }

        $data['message'] = $this->getExceptionMessage($object, isset($statusCode) ? $statusCode : null);

        return $data;
    }
    /**
     * {@inheritdoc}
     */
    public function supportsNormalization($data, $format = null)
    {
        return $data instanceof \Exception;
    }
}