<?php

namespace Flinks\BankingServices\Normalizer;

class NormalizerFactory
{
    public static function create()
    {
        $normalizers = array();
        $normalizers[] = new \Joli\Jane\Runtime\Normalizer\ReferenceNormalizer();
        $normalizers[] = new \Joli\Jane\Runtime\Normalizer\ArrayDenormalizer();
        $normalizers[] = new AuthorizeRequestNormalizer();
        $normalizers[] = new LoggedInResponseNormalizer();
        $normalizers[] = new LinkNormalizer();
        $normalizers[] = new LoginNormalizer();
        $normalizers[] = new ChallengeResponseNormalizer();
        $normalizers[] = new SecurityChallengeNormalizer();
        $normalizers[] = new ReauthorizeResponseNormalizer();
        $normalizers[] = new GetAccountsSummaryRequestNormalizer();
        $normalizers[] = new AccountsSummaryResponseNormalizer();
        $normalizers[] = new AccountNormalizer();
        $normalizers[] = new BalanceNormalizer();
        $normalizers[] = new GetAccountsDetailRequestNormalizer();
        $normalizers[] = new AccountsDetailResponseNormalizer();
        $normalizers[] = new AccountWithDetailsNormalizer();
        $normalizers[] = new HolderNormalizer();
        $normalizers[] = new AccountTransactionNormalizer();
        $normalizers[] = new ClientErrorResponseNormalizer();
        $normalizers[] = new ServerErrorResponseNormalizer();
        return $normalizers;
    }
}