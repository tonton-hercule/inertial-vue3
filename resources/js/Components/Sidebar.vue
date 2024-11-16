<script setup>
import { Link } from '@inertiajs/inertia-vue3';
import NavLink from '@/Components/NavLink.vue';
import { Inertia } from "@inertiajs/inertia";

</script>
<template>
    <div>
        <aside id="sidebar" class="sidebar">
            <ul class="sidebar-nav" id="sidebar-nav">
                <li class="nav-item">
                    <Link :href="route('dashboard')" class="nav-link collapsed no-underline" id="dashboard"><i class="bi bi-grid"></i>
                    <span>Tableau de bord </span></Link>
                </li>
                <!-- End Dashboard Nav -->
                <span v-if="$page.props.role.user == 'ADMIN' || $page.props.role.user == 'auteur'">
                    
                    <li class="nav-item">
                        <a
                            class="nav-link collapsed visible no-underline"
                            data-bs-target="#publications-nav"
                            data-bs-toggle="collapse"
                            href="#"
                        >
                            <i class="ri-repeat-2-fill"></i
                            ><span>Publications</span
                            ><i class="bi bi-chevron-down ms-auto"></i>
                        </a>
                        <ul
                            id="publications-nav"
                            class="nav-content collapse visible no-underline"
                            data-bs-parent="#sidebar-nav"
                        >
                        
                            <li>
                                <Link :href="route('publications.create')" class="nav-link collapsed"><i class="bi bi-circle"></i
                                    ><span>Nouvelle</span></Link>
                            </li>
                            <li>
                                <Link :href="route('publications.index')"><i class="bi bi-circle"></i
                                    ><span>Liste</span></Link>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a
                            class="nav-link collapsed"
                            data-bs-target="#ventes-nav"
                            data-bs-toggle="collapse"
                            href="#"
                        >
                            <i class="ri-repeat-2-fill"></i><span>Ventes</span
                            ><i class="bi bi-chevron-down ms-auto"></i>
                        </a>
                        <ul
                            id="ventes-nav"
                            class="nav-content collapse visible no-underline"
                            data-bs-parent="#sidebar-nav"
                        >
                            <li>
                                <Link :href="route('publications.index')"><i class="bi bi-circle"></i
                                    ><span>Quotidiennes</span></Link>
                            </li>
                            <li>
                                <Link :href="route('publications.index')"><i class="bi bi-circle"></i
                                    ><span>Abonnements</span></Link>
                            </li>
                        </ul>
                    </li>
                    <!-- Only for admin -->
                    <li class="nav-item" v-if="$page.props.role.user == 'ADMIN'">
                        <a
                            class="nav-link collapsed"
                            data-bs-target="#reversements-nav"
                            data-bs-toggle="collapse"
                            href="#"
                            style="text-decoration: none"
                        >
                            <i class="ri-repeat-2-fill"></i
                            ><span>Reversements</span
                            ><i class="bi bi-chevron-down ms-auto"></i>
                        </a>
                        <ul
                            id="reversements-nav"
                            class="nav-content collapse visible no-underline"
                            data-bs-parent="#sidebar-nav"
                        >
                            <li>
                                <Link :href="route('publications.index')"><i class="bi bi-circle"></i
                                    ><span>Operation</span></Link>
                            </li>
                            <li>
                                <Link :href="route('publications.index')"><i class="bi bi-circle"></i
                                    ><span>Liste reversements</span></Link>
                            </li>
                        </ul>
                    </li>
                    <!-- Contact -->
                    <li class="nav-item" v-if="$page.props.role.user == 'ADMIN'">
                        <a
                            class="nav-link collapsed"
                            data-bs-target="#Contact-nav"
                            data-bs-toggle="collapse"
                            href="#"
                            style="text-decoration: none"
                        >
                            <i class="ri-repeat-2-fill"></i><span>Contact</span
                            ><i class="bi bi-chevron-down ms-auto"></i>
                        </a>
                        <ul
                            id="Contact-nav"
                            class="nav-content collapse visible no-underline"
                            data-bs-parent="#sidebar-nav"
                        >
                            <li>
                                <Link :href="route('publications.index')"><i class="bi bi-circle"></i
                                    ><span>Liste</span></Link>
                            </li>
                        </ul>
                    </li>
                </span>
                <!--  -->
                <span v-if="$page.props.role.user == 'ADMIN' || $page.props.role.user == 'auteur'">
                    <li class="nav-item">
                        <a class="nav-link collapsed" data-bs-target="#parametres-nav" data-bs-toggle="collapse"
                            href="#" style="text-decoration: none">
                            <i class="ri-repeat-2-fill"></i><span>Paramètres</span><i
                                class="bi bi-chevron-down ms-auto"></i>
                        </a>
                        <ul id="parametres-nav" class="nav-content collapse visible no-underline" data-bs-parent="#sidebar-nav">
                            <li>
                                <Link :href="route('auteurs.index')"><i class="bi bi-grid"></i>
                                <span>Auteurs</span></Link>
                            </li>
                            <li>
                                <Link :href="route('auteurs.index')"><i class="bi bi-grid"></i>
                                <span>Editeurs</span></Link>
                            </li>
                            <li>
                                <Link :href="route('auteurs.index')"><i class="bi bi-grid"></i>
                                <span>Périodiques</span></Link>
                            </li>
                            <li>
                                <Link :href="route('auteurs.index')"><i class="bi bi-grid"></i>
                                <span>Mode Paiement</span></Link>
                            </li>
                        </ul>
                    </li>
                    <!-- ADMIN -->
                    <li class="nav-item">
                        <a
                            class="nav-link collapsed"
                            data-bs-target="#optimisation-nav"
                            data-bs-toggle="collapse"
                            href="#"
                        >
                            <i class="ri-repeat-2-fill"></i
                            ><span>Administration</span
                            ><i class="bi bi-chevron-down ms-auto"></i>
                        </a>
                        <ul
                            id="optimisation-nav"
                            class="nav-content collapse visible no-underline"
                            data-bs-parent="#sidebar-nav"
                        >
                            <li>
                                <Link :href="route('auteurs.index')"><i class="bi bi-grid"></i>
                                <span>Utilisateurs</span></Link>
                            </li>
                            <li>
                                <Link :href="route('roles.index')"><i class="bi bi-grid"></i>
                                <span>Rôles</span></Link>
                            </li>
                            <li>
                                <Link :href="route('statuts.index')"><i class="bi bi-grid"></i>
                                <span>Statuts</span></Link>
                            </li>
                            <li>
                                <Link :href="route('auteurs.index')"><i class="bi bi-grid"></i>
                                <span>Contenus</span></Link>
                            </li>
                            <li>
                                <Link :href="route('auteurs.index')"><i class="bi bi-grid"></i>
                                <span>Vider le cache</span></Link>
                            </li>
                            <li>
                                <Link :href="route('auteurs.index')"><i class="bi bi-grid"></i>
                                <span>Active storage</span></Link>
                            </li>
                        </ul>
                    </li>
                </span>
                <!--  -->
                <!-- End Paiement Nav -->
                <li class="nav-item">
                    <Link :href="route('auteurs.index')" class="nav-link collapsed no-underline"
                        id="change-password"><i class="ri-rotate-lock-line"></i>
                                <span>Changer mot de passe</span></Link>
                </li>
                <!-- End inportation Nav -->
                <hr class="mb-2">
                <li class="nav-item">
                    <Link :href="route('logout')" method="post" as="link" class="nav-link collapsed no-underline">
                        <i class="ri-logout-box-r-line"></i>Se déconnecter
                            </Link>
                </li>
                <!-- End inportation Nav -->
                <!-- End Dashboard Nav -->
                <!--<li class="nav-item">
                    <NavLink :href="route('posts.index')">
                        <i class="bi bi-file"></i><span>Posts</span>
                    </NavLink>
                </li>
                <li class="nav-item">
                    <NavLink :href="route('blogs.index')">
                        <i class="bi bi-users"></i><span>Blogs</span>
                    </NavLink>
                </li>
            <NavLink :href="route('logout')" method="post" as="button">
                        <i class="bi bi-users"></i><span>Se déconnecter</span>
                    </NavLink>-->

            </ul>
        </aside>
    </div>
</template>

