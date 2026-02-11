import { Head, Link, usePage } from '@inertiajs/react';
import { dashboard, login, register } from '@/routes';
import type { SharedData } from '@/types';

export default function Welcome({
    canRegister = true,
}: {
    canRegister?: boolean;
}) {
    const { auth } = usePage<SharedData>().props;

    return (
        <>
        <h1>Hola Mundo</h1>
        <p>Hola mundo</p>
        </>
    );
}
